<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inflow extends Model {

    const CREATED_AT = 'transactionDate';

    protected $table = 'inflow';

    protected $primaryKey = 'id_inflow';

    protected $guarded = [
        'id_inflow',
        'transactionDate',
        'id_child'
    ];

    protected $dates = [
        'transactionDate'
    ];

    public $timestamps = false;

    public function child() {
        return $this->belongsTo('App\Models\Child', 'id_child');
    }

    public static function getAssociatedInflows($id)
    {
      return \DB::table('inflow')->where(['id_child' => $id])->get();
    }

}
