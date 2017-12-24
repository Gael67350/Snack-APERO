<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model {

    protected $table = 'category';

    protected $primaryKey = 'id_category';

    protected $guarded = [
        'id_category'
    ];

    public $timestamps = false;

    public function children() {
        return $this->hasMany('App\Models\Child', 'id_category');
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }

}
