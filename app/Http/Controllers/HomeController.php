<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function pump(){
        return view('pages.pump');
    }
    public function light(){
        return view('pages.pump');
    }
    public function memo(){
        return view('pages.memo');
    }
    public function farmer(){
        return view('pages.farmer');
    }
}
