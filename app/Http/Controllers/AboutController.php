<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class AboutController extends Controller
{

    public function index()
    {
        // dd($this->em->getMetadataFactory()->getAllMetadata());

        return view("about");
    }
}
