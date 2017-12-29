<?php

namespace App\Http\Controllers;

use Auth;
use App\Models;

class PurchasesController extends Controller {

    public function index() {
        //$concernedPurchases = Models\Purchase::all()->where("id_user",$id);
        $concernedPurchases = Auth::user()->purchases()->get();
        return $this->render('stock.buyHistory', ["purchases" => $concernedPurchases]);
    }

    public function initDbReinitialiser() {
        return $this->render('administration.databaseReinitialiser');
    }

    public function delPur()
    {
        Models\Purchase::deleteGroup($_GET['id']);
        return \Redirect::Back();
    }
}
