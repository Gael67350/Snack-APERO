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

    public function launchProductSearch()
    {
      $products = Models\Product::all();
      return $this->render('administration.productSearch' , ['products' => $products]);
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

    public function openManager()
    {
      if(isset($_GET['id']))
      {
        $product = Models\Product::find($_GET['id']);
        return $this->render("administration.productManagment" , ['product' => $product]);
      }
      else
      {
          return $this->render("administration.productManagment");
      }
    }

}
