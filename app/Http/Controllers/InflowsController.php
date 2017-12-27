<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models;
use Auth;

class InflowsController extends Controller {

    public function index() {

    }

    public function openInflows()
    {
      $child = Models\Child::find($_GET['id']);
      $inflows = Models\Inflow::getAssociatedInflows($child->id_child);
      return $this->render("consumption.inflowRefill" , ['managed' => $child , 'inflows' => $inflows]);
    }

    public function insertNewInflow()
    {
      \DB::table('inflow')->insert(['transactionDate' => date("Y-m-d") , 'amount' => $_POST['ammount'],'id_child' => $_POST['id']]);
      return \Redirect::back();
    }

}
