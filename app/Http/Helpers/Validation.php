<?php

namespace App\Http\Helpers;

use Illuminate\Support\Facades\Request;

class Validation {

    private $inputs;

    private $valid;

    private $errors;


    public function __construct($inputs = null) {

        if (is_null($inputs))
            $inputs = Request::all();

        $this->inputs = $inputs;

        $this->errors = [];

        $this->valid = true;

    }

    public function required(string ... $inputs) {

        foreach ($inputs as $name) {

            if (trim($this->inputs[$name]) == '') {

                $this->error($name, "Ce champs est obligatoire.");

            }

        }

    }

    public function error($name, $message = null) {

        if (is_null($message)) {

            return $this->ok($name) ? '' : $this->errors[$name];

        } elseif ($this->ok($name)) {

            $this->errors[$name] = $message;

            $this->valid = false;

        }

    }

    public function ok($name) {

        return !array_key_exists($name, $this->errors);

    }

    public function date(string ... $inputs) {

        foreach ($inputs as $name) {

            if ($this->has($name) && !preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/', $this->get($name))) {

                $this->error($name, "Cette date n'est pas valide.");

            }

        }

    }

    public function has($name) {

        return isset($this->inputs[$name]);

    }

    public function get($name) {

        return $this->has($name) ? $this->inputs[$name] : null;

    }

    public function phone(string ... $inputs) {

        foreach ($inputs as $name) {

            if ($this->has($name)) {

                if (!preg_match('/^([+]{0,1})([0-9]{10,12})$/', $this->get($name))) {

                    $this->error($name, "Ce numéro est invalide.");

                }

            }

        }

    }


    public function select($name, $options) {

        if (!in_array($this->get($name), $options)) {

            $this->error($name, "Cette option n'est pas valide.");

        }

    }


    public function boolean(string ... $inputs) {

        foreach ($inputs as $name) {

            if (!$this->has($name) || !$this->ok($name) || !in_array($this->get($name), ['0', '1'])) {

                $this->error($name, "Cette valeur est invalide.");

            }

        }

    }

    public function integer(string ... $inputs) {

        foreach ($inputs as $name) {

            $this->filter($name, FILTER_VALIDATE_INT, "Veuillez saisir un entier numérique.");

        }

    }

    public function filter($name, $filter, $error) {

        if (!$this->ok($name))
            return;

        if (!filter_var($this->get($name), $filter)) {

            $this->error($name, $error);

        }

    }

    public function numeric(string ... $inputs) {

        foreach ($inputs as $name) {

            $this->filter($name, FILTER_VALIDATE_FLOAT, "Veuillez saisir une valeur numérique.");

        }

    }


    public function ip(string ... $inputs) {

        foreach ($inputs as $name) {

            $this->filter($name, FILTER_VALIDATE_IP, "Veuillez saisir une adresse IP valide.");

        }

    }


    public function email(string ... $inputs) {

        foreach ($inputs as $name) {

            $this->filter($name, FILTER_VALIDATE_EMAIL, "Veuillez saisir une adresse mail valide.");

        }

    }


    public function url(string ... $inputs) {

        foreach ($inputs as $name) {

            $this->filter($name, FILTER_VALIDATE_URL, "Veuillez saisir une adresse URL valide.");

        }

    }


    public function exists($name, $table, $column) {

        return Model::query('SELECT * FROM ' . $table . ($column != NULL ? ' WHERE ' . $column . ' = "' . $this->get($name) . '"' : ''));

    }


    public function unique($name, $table, $column, $diff = NULL) {

        if ($this->get($name) != $diff || is_null($diff)) {

            $query = Model::query('SELECT * FROM ' . $table . ' WHERE ' . $column . ' = ' . $this->get($name));

            if ($query->rowCount())
                $this->error($name, 'Le champ ' . $name . ' est déjà utilisé.');

        }

    }


    public function matches($field, $with) {

        if (!$this->ok($field) || !$this->ok($with))
            return;

        if ($this->get($field) != $this->get($with))
            $this->error($with, 'Le champ ne correspond pas.');

    }


    public function upload($name, $parameters) {

        if (!$this->ok($name))
            return;

        if (!Request::singleton()->hasFile($name))
            return;


        $file = $_FILES[$name];

        $parameters = explode('|', $parameters);


        foreach ($parameters as $param) {

            $param = explode(':', $param);

            $rule = $param[0];

            $value = $param[1];


            switch ($rule) {

                case 'matches':
                    {

                        $values = explode(',', $value);

                        $parts = explode('.', $file['name']);

                        if (!in_array(end($parts), $values))

                            $this->error($name, 'Le fichier doit être de type : ' . implode(', ', $values));

                        break;

                    }


                case 'max':
                    {

                        if ($file['size'] > $value)

                            $this->error($name, 'Le fichier ne doit pas dépasser ' . human_filesize($value));

                        break;

                    }


                default:

                    break;

            }

        }

    }

    public function valid() {

        return $this->valid;

    }

}