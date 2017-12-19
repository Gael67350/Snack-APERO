<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model {

    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $guarded = ['id_user'];

    protected $hidden = ['password'];

    public $timestamps = false;

    public function children() {
        return $this->hasMany('App\Models\Child', 'id_user');
    }

    public function purchases() {
        return $this->hasMany('App\Models\Purchase', 'id_user');
    }

    public function setPasswordAttribute($value) {
        $this->attributes['password'] = Hash::make($value);
    }

}
