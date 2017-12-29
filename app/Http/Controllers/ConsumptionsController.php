<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsumptionsController extends Controller {

    public function index() {

    }

    public function showChildSrch() {
        $childs = Models\Child::all();
        return $this->render("consumption.childSearch", ['childs' => $childs]);
    }

    public function showExistingConsumption($id) {
        $child = Models\Child::findOrFail($id);
        $consumptions = $child->consumptions()->get();
        $buyables = Models\Product::getAllBuyableComposed();
        return $this->render("consumption.delConsumption", ['child' => $child, 'consumptions' => $consumptions, 'buyable' => $buyables]);
    }

    public function delConsumption($id) {
        Models\Consumption::delConcerns($id);
        Models\Consumption::findOrFail($id)->delete();
        return \Redirect::Back();
    }

    public function insert(Request $request) {
        $child = Models\Child::findOrFail($request->id_child);

        if (!isset($request->number)) {
            return redirect(back());
        }

        $consumption = new Models\Consumption();
        $consumption->transactionDate = date('Y-m-d');
        $consumption->id_child = $child->id_child;
        $consumption->id_consumption = DB::getPdo()->lastInsertId() + 1;
        $id = $consumption->save();

        var_dump($id);

        for ($i = 0; $i < $request->number - 1; $i++) {
            $fieldName = "c" . $i;
            $fieldQuantityName = "q" . $i;

            if (isset($request->{$fieldName}) && isset($request->{$fieldQuantityName})) {
                DB::table('concerns')->insert(['id_consumption' => $id, 'id_product' => $request->{$fieldName}, 'quantity' => $request->{$fieldQuantityName}]);
            }
        }

        return redirect(route('delConsum', ['id' => $child->id_child]));
    }
}
