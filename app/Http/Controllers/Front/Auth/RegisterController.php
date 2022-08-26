<?php

namespace App\Http\Controllers\Front\Auth;

use Guysolamour\Administrable\Http\Controllers\Front\Auth\RegisterController as AuthRegisterController;

class RegisterController extends AuthRegisterController
{
      /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return to_route('login');
        // dd('sadddlur');
        // return front_view( 'auth.login');
    }

}
