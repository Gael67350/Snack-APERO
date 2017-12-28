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

    public function index($id = null) {
        $user = Auth::user();

        if ($user->isAdmin() || $user->isVolunteer()) {
            $children = Models\Child::all();
            $products = Models\Product::all();

            if ($user->isAdmin()) {
                $CurrentAlert = Models\Product::getCurrentAlerts();
                return $this->render('home.indexAdmin', ['children' => $children, 'products' => $products, 'CurrentAlert' => $CurrentAlert]);
            } else {
                return $this->render('home.indexAdmin', ['children' => $children, 'products' => $products]);
            }

        } else {
            $children = $user->children()->get();
            $displayedChild = $user->children->first();

            if (!is_null($id)) {
                $displayedChild = Models\Child::find($id);
            }

            return $this->render('home.indexUser', compact('children', 'displayedChild'));
        }
    }
}
