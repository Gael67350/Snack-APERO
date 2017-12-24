<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model {

    const CREATED_AT = 'transactionDate';

    protected $table = 'consumption';

    protected $primaryKey = 'id_consumption';

    protected $guarded = [
        'id_consumption',
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

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'concerns', 'id_consumption', 'id_product')->withPivot('quantity');
    }

    public function getProductQuantity() {
        if (is_null($this->pivot)) {
            throw new \Error('Cannot find quantity of product for a consumption that is not currently in a relation');
        }

        return $this->pivot->quantity;
    }

    public static function getRelatedConsumption($id)
    {
      return \DB::table('consumption')->where(['id_child' => $id])->get();
    }

}
