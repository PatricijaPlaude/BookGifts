<?php

namespace App\Http\Controllers;
use Cookie;
use Illuminate\Http\Request;

class LangController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function update($n)
    {
        Cookie::queue(Cookie::make('lang', $n, 4500));
        return redirect()->back();
    }
}
