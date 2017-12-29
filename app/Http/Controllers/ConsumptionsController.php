<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;

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

        for ($i = 0; $i < $request->number - 1; $i++) {
            $fieldName = "c" . $i;
            $fieldQuantityName = "q" . $i;

            if (isset($request->{$fieldName}) && isset($request->{$fieldQuantityName})) {
                $consumption->products()->save(['id' => $child->id_child]);
                $consumption->pivot->quantity = $request->{$fieldQuantityName};
                $consumption->pivot->save();
            }
        }

        $consumption->save();

        return redirect(route('ConsumptionsController@showChildSrch', ['id' => $child->id_child]));
    }
}
