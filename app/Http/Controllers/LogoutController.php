<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class LogoutController extends Controller {
    public function index() {
        session()->forget('user');
        return redirect()->route('/');
    }
}