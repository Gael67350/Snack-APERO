<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {

    protected $table = 'product';

    protected $primaryKey = 'id_product';

    protected $guarded = [
        'id_product'
    ];

    public $timestamps = false;

    public function purchases() {
        return $this->belongsToMany('App\Models\Purchase', 'purchase', 'id_product', 'id_purchase')->withPivot('quantity');
    }

    public function ingredients() {
        return $this->belongsToMany('App\Models\Product', 'composedof', 'id_product', 'id_product_1')->withPivot('quantity');
    }

    public function consumptions() {
        return $this->belongsToMany('App\Models\Consumption', 'concerns', 'id_product', 'id_consumption')->withPivot('quantity');
    }

    /**
     * @throws \Error
     */
    public function getQuantity() {
        if(is_null($this->pivot)) {
            throw new \Error('Cannot find quantity for a product that is not currently in a relation');
        }

        return $this->pivot->quantity;
    }

    public function setNameAttribute($value) {
        $this->attributes['name'] = ucfirst($value);
    }

    public function getStock() {
        return \DB::table('stock')->where(['id_product' => $this->id_product])->value('quantity_available');
    }

    public static function getFullStock() {
        return \DB::table('stock')->get();
    }
}
