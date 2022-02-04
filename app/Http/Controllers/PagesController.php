<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function demo1(){
        return view('user.pages.demo1');
    }
    public function demo2(){
        return view('user.pages.demo2');
    }
}
