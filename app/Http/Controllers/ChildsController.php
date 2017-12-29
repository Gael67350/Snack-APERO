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

    public function openChildManager($id) {
        //$child = Models\Child::find($_GET['id']);
        $child = Models\Child::findOrFail($id);
        $productUncomposed = Models\Product::getAllBuyableUncomposed();
        $productComposed = Models\Product::getAllBuyableComposed();

        $json = json_encode(Models\Product::all());

        return $this->render('consumption.newConsumption', ['child' => $child, "productComposed" => $productComposed, 'productUncomposed' => $productUncomposed, 'json' => $json]);
    }
}
