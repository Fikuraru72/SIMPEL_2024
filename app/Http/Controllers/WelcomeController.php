<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class WelcomeController extends Controller
{
    public function welcome (){
        // dd(Auth::user());
        return view('welcome');
    }
}
