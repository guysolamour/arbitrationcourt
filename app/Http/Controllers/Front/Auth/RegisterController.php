<?php

namespace App\Http\Controllers\Front\Auth;

use Illuminate\Support\Arr;
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
        if ($id = request()->query('request')){
            $model = \App\Models\Request::find($id);
            return front_view('auth.register', compact('model'));
        }

        return front_view('auth.register');
    }

     /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \Illuminate\Foundation\Auth\User
     */
    protected function create(array $data)
    {
        // dd(\App\Models\Request::find(Arr::get($data, 'model_id')));
        $user = parent::create($data);

        if ($id = Arr::get($data, 'model_id')){
            $model = \App\Models\Request::find($id);

            if ($model){
                $model->defender_id = $user->getKey();
                $model->save();
            }

        }

        return $user;
    }



}
