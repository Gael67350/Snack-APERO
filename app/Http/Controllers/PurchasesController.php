<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PurchasesController extends Controller {

    public function index()
    {
      $id = Auth::user()->id_user;
      $concernedPurchases = Models\Purchase::all()->where("id_user",$id);
      return $this->render('stock.buyHistory',["purchases" => $concernedPurchases]);
    }

}
