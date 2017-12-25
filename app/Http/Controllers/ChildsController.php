<?php

namespace App\Http\Controllers;
use App\Models;
use Auth;

use Illuminate\Http\Request;

class ChildsController extends Controller {

    public function index() {

    }

    public function showChilds()
    {
    $childrenRelated = Models\Child::getRelatedChild(Auth::user()->user_id);
    if(isset($childrenRelated[0]))
    {
      if(!isset($_GET['toDisp']))
      {
        return $this->render('child.childView',['children' => $childrenRelated,'Display' => Models\Child::find($childrenRelated[0]->id_child) , 'displayedCategory' => Models\Category::getRelatedCategory($childrenRelated[0]->id_category) ,'AssociatedConsumption' =>  Models\Consumption::getRelatedConsumption($childrenRelated[0]->id_user) ,'AssociatedInflows' => Models\Inflow::getAssociatedInflows($childrenRelated[0]->id_user)]);
      }
      else
      {
        return $this->render('child.childView',['children' => $childrenRelated,'Display' => Models\Child::find($_GET['toDisp']) , 'displayedCategory' => Models\Category::getRelatedCategory(Models\Child::find($_GET['toDisp'])->id_category) ,'AssociatedConsumption' =>  Models\Consumption::getRelatedConsumption(Models\Child::find($_GET['toDisp'])->id_user) ,'AssociatedInflows' => Models\Inflow::getAssociatedInflows(Models\Child::find($_GET['toDisp'])->id_user)]);
      }
    }
    else
    {
        return $this->render('child.childView');
    }
   }
}
