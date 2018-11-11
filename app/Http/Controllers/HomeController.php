<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Slide;
use ArticulosReligiosos\Product;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$slides = Slide::select('redirect', 'img_url', 'title', 'text')->orderBy('updated_at', 'desc')->get();
        $discounts = Product::where('discount_percent', '>', 0)->orderBy('discount_percent', 'desc')->take(10)->get();
        $pinneds = Product::where('pinned', true)->orderBy('name', 'desc')->take(10);
        $bestsellers;
        $products = Product::inRandomOrder()->take(10)->get();
        return view('home', compact('slides', 'products'));
    }
}
