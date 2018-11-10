<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Slide;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$slides = Slide::all();
        return view('home', compact('slides'));
    }
}
