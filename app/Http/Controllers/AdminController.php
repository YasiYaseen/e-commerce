<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function login()
    {
        return view('admin.login');
    }
    public function dologin()
    {
        $input = request()->only(['username', 'password']);
        if (auth('admin')->attempt($input)) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('admin.do.login')->with('error','Login Failed');
        }


        //end
    }

    /* class end */
}
