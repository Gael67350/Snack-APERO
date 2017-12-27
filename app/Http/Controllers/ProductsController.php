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
      $CurrentAlert = Models\Product::getCurrentAlerts();
      return $this->render('administration.stockAlertHistory' , ['logListing' => $logListing , 'CurrentAlert' => $CurrentAlert]);
    }

    public function launchProductSearch()
    {
      $products = Models\Product::all();
      return $this->render('administration.productSearch' , ['products' => $products  ]);
    }

    public function displayStocks()
    {
      $products = Models\Product::all();
      if(Auth::user()->isadmin())
      {
        $CurrentAlert = Models\Product::getCurrentAlerts();
        return $this->render('stock.stockSumup',['products' => $products, 'CurrentAlert' => $CurrentAlert]);
      }
      else
      {
        return $this->render('stock.stockSumup',['products' => $products]);
      }
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
      $productListUncomposed = Models\Product::getAllUncomposed();
      $productListComposed = Models\Product::getAllcomposed();
      if(isset($_GET['id']))
      {
        $product = Models\Product::find($_GET['id']);
        if(isset($product))
        {
          $components = $product->getComponents();
          return $this->render("administration.productManagment" , ['product' => $product , 'components' => $components  , 'productListUncomposed' => $productListUncomposed , 'productListComposed' => $productListComposed]);
        }
        else
        {
          return $this->render("administration.productManagment",['product' => $product   , 'productListUncomposed' => $productListUncomposed , 'productListComposed' => $productListComposed]);
        }
      }
      else
      {
          return $this->render("administration.productManagment",[ 'productListUncomposed' => $productListUncomposed , 'productListComposed' => $productListComposed]);
      }
    }

}
