<?php

namespace App\Http\Controllers;
use App\Models;
use Auth;

class HomeController extends Controller
{
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
        if(Auth::user()->privilege == 2)
        {
        $childsRelated = Models\Child::getRelatedChild(11/*Auth::user()->user_id*/);
          return $this->render('home.indexUser',['childs' => $childsRelated,'idDisplay' => 0 , 'childBalance' => Models\Child::getBalance($childsRelated[0]->id_child) , 'displayedCategory' => Models\Category::getRelatedCategory($childsRelated[0]->id_category) ,'AssociatedConsumption' =>  Models\Consumption::getRelatedConsumption($childsRelated[0]->id_user) ,'AssociatedInflows' => Models\Inflow::getAssociatedInflows($childsRelated[0]->id_user)]);
        }
        else
        {
          $childs = Models\Child::all();
          $products = Models\Product::all();
          return $this->render('home.indexAdmin' , ['childs'=> $childs,'products'=>$products]);
        }
    }
}
