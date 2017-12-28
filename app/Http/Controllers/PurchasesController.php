<?php

namespace App\Http\Controllers;

use Auth;

class PurchasesController extends Controller {

    public function index() {
        //$concernedPurchases = Models\Purchase::all()->where("id_user",$id);
        $concernedPurchases = Auth::user()->purchases()->get();
        return $this->render('stock.buyHistory', ["purchases" => $concernedPurchases]);
    }

    public function initDbReinitialiser() {
        return $this->render('administration.databaseReinitialiser');
    }

}
