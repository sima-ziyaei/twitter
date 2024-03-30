<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{


    public function index()
    {
        if (session()->has('user')) {
            $name = session("user")->name;
            return view('welcome', ['name' => $name]);
        } else {
            return view('welcome', ['name' => '']);
        }
    }
}
