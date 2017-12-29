<?php

namespace App\Http\Controllers;

use App\Models;

class ConsumptionsController extends Controller {

    public function index() {

    }

    public function showChildSrch()
    {
      $childs = Models\Child::all();
      return $this->render("consumption.childSearch", ['childs' => $childs]);
    }

    public function showExistingConsumption($id)
    {
        $child = Models\Child::findOrFail($id);
        $consumptions = $child->consumptions()->get();
      $buyables = Models\Product::getAllBuyableComposed();
        return $this->render("consumption.delConsumption", ['child' => $child, 'consumptions' => $consumptions, 'buyable' => $buyables]);
    }
}
