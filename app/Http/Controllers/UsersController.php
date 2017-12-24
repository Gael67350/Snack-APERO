<?php

namespace App\Http\Controllers;

use App\Models\User;

class UsersController extends Controller {

    public function index() {

    }

    public function profile($id) {

        if (\Auth::user()->id_user != $id && !\Auth::user()->isAdmin()) {
            abort(403, 'Accès interdit');
        }

        $user = User::findOrFail($id);

        return $this->render('user.profile', compact('user'));
    }

}
