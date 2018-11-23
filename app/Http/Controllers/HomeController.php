<?php
//Controller que se encarga de la pagina principal.
namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Slide;
use ArticulosReligiosos\Product;
use ArticulosReligiosos\App_config;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*
            Retorna la vista home con una lista de slides, descuentos, destacados, mas vendidos y productos aleatorios.
        */
        $config = App_config::all()->first();
    	$slides = Slide::select('redirect', 'img_url', 'title', 'text')->orderBy('updated_at', 'desc')->get();
        $discounts = Product::where('discount_percent', '>', 0)->orderBy('discount_percent', 'desc')->take($config->carousel_products)->get();
        $pinneds = Product::where('pinned', true)->orderBy('name', 'desc')->take($config->carousel_products)->get();
        $collection = collect([]);
        $bestsellers = collect([]);
        foreach (Product::all() as $product) {
            $collection->push(collect(['id' => $product->id, 'sales' => $product->sales()->count()]));
        }
        $collection->sortBy('sales')->take($config->carousel_products);
        foreach ($collection as $item) {
            $bestsellers->push(Product::find($item->get('id')));
        }
        $products = Product::inRandomOrder()->take($config->ramdom_products)->get();
        return view('home', compact('slides', 'products', 'bestsellers', 'discounts', 'pinneds'));
    }
}
