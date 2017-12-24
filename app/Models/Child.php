<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Child extends Model {

    protected $table = 'child';

    protected $primaryKey = 'id_child';

    protected $guarded = [
        'id_child',
        'id_category',
        'id_user'
    ];

    protected $dates = [
        'birthDate'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function category() {
        return $this->belongsTo('App\Models\Category', 'id_category');
    }

    public function inflows() {
        return $this->hasMany('App\Models\Inflow', 'id_child');
    }

    public function consumptions() {
        return $this->hasMany('App\Models\Consumption', 'id_child');
    }

    public function setLastNameAttribute($value) {
        $this->attributes['lastName'] = ucfirst($value);
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }

    public static function getBalance($id)
    {
      return \DB::table('child_balance')->where(['id_child' => $id])->get();
    }

}
