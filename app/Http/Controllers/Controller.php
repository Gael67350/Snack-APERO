<?php

namespace App\Http\Controllers;
use App\Models;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\View;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $layout = 'layouts.default';

    public function render($view, $options = []) {
        $layout = View::make($this->layout);
        $layout->content = View::make($view)->with($options)->render();

        return $layout->render();
    }

    public function reinit()
    {
      $childs = Models\Child::all();
      foreach ($childs as $child)
      {
        $money = $child->getBalance();

        $consumptions = Models\Consumption::where('id_child' , $child->id_child)->get();
        $inflows = Models\Inflow::where('id_child' , $child->id_child)->get();
        foreach ($consumptions as $consumption)
        {
          Models\Consumption::delConcerns($consumption->id_consumption);
          $consumption->delete();
        }
        foreach ($inflows as $inflow)
        {
          $inflow->delete();
        }

        $inflow = new Models\Inflow(['transactionDate' => date("Y-m-d") , 'amount' => $money]);
        Models\Child::findOrFail($child->id_child);
        $inflow->id_child = $child->id_child;
        $inflow->transactionDate = date("Y-m-d");
        $inflow->save();
      }
      return \Redirect::Back();
    }
}
