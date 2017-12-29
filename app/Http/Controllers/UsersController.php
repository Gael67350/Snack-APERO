<?php

namespace App\Http\Controllers;

use App\Models;

class UsersController extends Controller {

    public function index() {

    }

    public function profile($id) {

        if (\Auth::user()->id_user != $id && !\Auth::user()->isAdmin()) {
            abort(403, 'Accès interdit');
        }

        $user = Models\User::findOrFail($id);

        return $this->render('user.profile', compact('user'));
    }

    public function launchPersonSearch() {
        $persons = Models\User::all();
        return $this->render('administration.personSearch', ['persons' => $persons]);
    }

    public function openUserManager($id) {
        if ($id>=0)
        {
            $person = Models\User::find($id);
            $childrenRelated = $person->children()->get();
            return $this->render('administration.personEdit', ['managed' => $person, 'childrenRelated' => $childrenRelated]);
        } else {
            return $this->render('administration.personEdit');
        }
    }
}
