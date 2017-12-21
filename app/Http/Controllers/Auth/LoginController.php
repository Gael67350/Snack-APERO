<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Validation;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm() {
        return $this->render('auth.login');
    }

    public function login(Request $request) {
        $validator = new Validation($request->all());

        $validator->required('email', 'password', 'remember');
        $validator->email('email');
        $validator->boolean('remember');

        if ($validator->valid() && Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect($this->redirectPath());
        }

        return back()->withInput()->withErrors(['message' => 'Le couple email/mot de passe ne semble pas valide.']);
    }

}
