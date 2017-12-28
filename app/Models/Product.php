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

    public static function getLogs()
    {
      return \DB::table('log')->get();
    }

    public static function getCurrentAlerts()
    {
      return \DB::table('log')->select('*')->where('created' , ">=" , date("Y-m-d", strtotime(date("Y-m-d"). '- 8 day')))->get();
    }

    public function getComponents()
    {
      return \DB::select(\DB::raw("select * FROM product p, composedof co WHERE co.id_product_1 = p.id_product AND co.id_product =".$this->id_product));
    }

    public static function getAllUncomposed()
    {
      return \DB::select(\DB::raw("select * FROM product p WHERE p.id_product NOT IN (SELECT id_product FROM composedof)"));
    }

    public static function getAllComposed()
    {
      return \DB::select(\DB::raw("select * FROM product p WHERE p.id_product IN (SELECT id_product FROM composedof)"));
    }

    public static function getAllBuyableUncomposed()
    {
      return \DB::select(\DB::raw("select * FROM product p WHERE p.price IS NOT NULL AND p.id_product NOT IN (SELECT id_product FROM composedof)"));
    }

    public static function getAllBuyableComposed()
    {
      return \DB::select(\DB::raw("select * FROM product p WHERE p.price IS NOT NULL AND p.id_product IN (SELECT id_product FROM composedof)"));
    }
}
