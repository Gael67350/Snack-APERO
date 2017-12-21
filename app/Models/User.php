<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class User extends Model implements Authenticatable {

    protected $table = 'user';

    protected $primaryKey = 'id_user';

    protected $guarded = ['id_user'];

    protected $hidden = ['password', 'remember_token'];

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

    public function isAdmin() {
        return $this->privilege === 0;
    }

    public function isVolunteer() {
        return $this->privilege === 1;
    }

    /**
     * Get the name of the unique identifier for the user.
     *
     * @return string
     */
    public function getAuthIdentifierName() {
        return $this->primaryKey;
    }

    /**
     * Get the unique identifier for the user.
     *
     * @return mixed
     */
    public function getAuthIdentifier() {
        return $this->id_user;
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword() {
        return $this->password;
    }

    /**
     * Get the token value for the "remember me" session.
     *
     * @return string
     */
    public function getRememberToken() {
        return $this->remember_token;
    }

    /**
     * Set the token value for the "remember me" session.
     *
     * @param  string $value
     * @return void
     */
    public function setRememberToken($value) {
        $this->update(['remember_token' => $value]);
        $this->save();
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName() {
        return 'remember_token';
    }
}
