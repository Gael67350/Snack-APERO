<?php

namespace App\Http\Controllers;

use App\Models;
use Auth;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $user = Auth::user();

        if ($user->isAdmin() || $user->isVolunteer()) {
            $children = Models\Child::all();
            $products = Models\Product::all();

            return $this->render('home.indexAdmin', ['children' => $children, 'products' => $products]);
        }
        else
        {
          $childrenRelated = Models\Child::getRelatedChild(Auth::user()->user_id);
          if(isset($childrenRelated[0]))
          {
            if(!isset($_POST['toDisp']))
            {
              return $this->render('home.indexUser',['children' => $childrenRelated,'Display' => Models\Child::find($childrenRelated[0]->id_child) , 'displayedCategory' => Models\Category::getRelatedCategory($childrenRelated[0]->id_category) ,'AssociatedConsumption' =>  Models\Consumption::getRelatedConsumption($childrenRelated[0]->id_user) ,'AssociatedInflows' => Models\Inflow::getAssociatedInflows($childrenRelated[0]->id_user)]);
            }
            else
            {
              return $this->render('home.indexUser',['children' => $childrenRelated,'Display' => Models\Child::find($_POST['toDisp']) , 'displayedCategory' => Models\Category::getRelatedCategory(Models\Child::find($_POST['toDisp'])->id_category) ,'AssociatedConsumption' =>  Models\Consumption::getRelatedConsumption(Models\Child::find($_POST['toDisp'])->id_user) ,'AssociatedInflows' => Models\Inflow::getAssociatedInflows(Models\Child::find($_POST['toDisp'])->id_user)]);
            }
          }
          else
          {
              return $this->render('home.indexUser');
          }
        }
    }
}
