<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model {

    const CREATED_AT = 'transactionDate';

    protected $table = 'purchasegroup';

    protected $primaryKey = 'id_purchase';

    protected $guarded = [
        'id_purchase'
    ];

    protected $dates = [
        'transactionDate'
    ];

    public $timestamps = false;

    public function user() {
        return $this->belongsTo('App\Models\User', 'id_user');
    }

    public function products() {
        return $this->belongsToMany('App\Models\Product', 'purchase', 'id_purchase', 'id_product')->withPivot('quantity');
    }

    public function getProductQuantity() {
        if (is_null($this->pivot)) {
            throw new \Error('Cannot find quantity of product for a purchase that is not currently in a relation');
        }

        return $this->pivot->quantity;
    }

    public static function getPurchases($id)
    {
      return \DB::table('purchasegroup')->where(['id_user' => $id])->get();
    }

    public static function getAssociatedPurchases($id)
    {
      return \DB::table('purchase')->where(['id_purchase' => $id])->get();
    }
}
