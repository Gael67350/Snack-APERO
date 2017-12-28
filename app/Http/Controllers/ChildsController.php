<?php

namespace App\Http\Controllers;

use App\Models;

class ChildsController extends Controller {

    public function index() {
        $children = Models\Child::all();
        return $this->render('child.index', compact('children'));
    }

    public function display($id) {
        $child = Models\Child::findOrFail($id);
        return $this->render('child.display', compact('child'));
    }

    public function openChildManager() {
        $child = Models\Child::find($_GET['id']);
        $productUncomposed = Models\Product::getAllBuyableUncomposed();
        $productComposed = Models\Product::getAllBuyableComposed();
        return $this->render('consumption.newConsumption', ['managed' => $child, "productComposed" => $productComposed, 'productUncomposed' => $productUncomposed]);
    }
}
