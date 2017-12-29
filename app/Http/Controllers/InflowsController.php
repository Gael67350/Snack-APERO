<?php

namespace App\Http\Controllers;

use App\Models;
use Illuminate\Http\Request;

class InflowsController extends Controller {

    public function index() {

    }

    public function openInflows($id)
    {
        $child = Models\Child::findOrFail($id);
        $inflows = $child->inflows->get();
      return $this->render("consumption.inflowRefill" , ['managed' => $child , 'inflows' => $inflows]);
    }

    public function insertNewInflow(Request $request)
    {
      $inflow = new Models\Inflow(['transactionDate' => date("Y-m-d") , 'amount' => $request->amount]);
      Models\Child::findOrFail($request->id);
      $inflow->id_child = $request->id;
      $inflow->transactionDate = date("Y-m-d");
      $inflow->save();
      return \Redirect::Back();
    }

}
