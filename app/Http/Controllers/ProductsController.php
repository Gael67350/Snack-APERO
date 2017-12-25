<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Auth;

class ProductsController extends Controller {

    public function index() {

    }

    public function displayLogs()
    {
      $logListing = Models\Product::getLogs();
      return $this->render('administration.stockAlertHistory' , ['logListing' => $logListing]);
    }

    public function launchPersonSearch()
    {
      return $this->render('administration.personSearch');
    }

    public function launchProductSearch()
    {
      return $this->render('administration.productSearch');
    }

    public function displayStocks()
    {
      $products = Models\Product::all();
      return $this->render('stock.stockSumup',['products' => $products]);
    }

    public function recordBuy()
    {
      return $this->render('stock.buyInsert');
    }

    public function buyHistory()
    {
      $user = Auth::user();
      $associatedPurchases = Models\Purchase::getPurchases($user->id_user);
      return $this->render('stock.buyHistory',['purchases' => $associatedPurchases ]);
    }

}
