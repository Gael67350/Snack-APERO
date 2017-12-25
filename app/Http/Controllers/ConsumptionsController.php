<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsumptionsController extends Controller {

    public function index() {

    }

    public function showChildSrch()
    {
      return $this->render("consumption.childSearch");
    }

}
