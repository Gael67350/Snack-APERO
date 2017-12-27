<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;

class ConsumptionsController extends Controller {

    public function index() {

    }

    public function showChildSrch()
    {
      $childs = Models\Child::all();
      return $this->render("consumption.childSearch", ['childs' => $childs]);
    }

    public function showExistingConsumption()
    {
      $child = Models\Child::find($_GET['id']);
      $consumptions = Models\Consumption::getRelatedConsumption($child->id_child);
      $buyables = Models\Product::getAllBuyableComposed();
      return $this->render("consumption.delConsumption" , ['managed' => $child , 'associatedConsumption' => $consumptions , 'buyable' => $buyables]);
    }
}
