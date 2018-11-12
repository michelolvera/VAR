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
        $pinneds = Product::where('pinned', true)->orderBy('name', 'desc')->take(10)->get();
        $collection = collect([]);
        $bestsellers = collect([]);
        foreach (Product::all() as $product) {
            $collection->push(collect(['id' => $product->id, 'sales' => $product->sales()->count()]));
        }
        $collection->sortBy('sales')->take(10);
        foreach ($collection as $item) {
            $bestsellers->push(Product::find($item->get('id')));
        }
        $products = Product::inRandomOrder()->take(10)->get();
        return view('home', compact('slides', 'products', 'bestsellers', 'discounts', 'pinneds'));
    }
}
