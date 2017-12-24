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
    public function index() {
        $user = Auth::user();

        if ($user->isAdmin() || $user->isVolunteer()) {
            $children = Models\Child::all();
            $products = Models\Product::all();

            return $this->render('home.indexAdmin', ['children' => $children, 'products' => $products]);
        }

        return $this->render('home.indexUser');
    }

}
