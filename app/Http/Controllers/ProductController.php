<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Product;
use ArticulosReligiosos\Categorie;
use ArticulosReligiosos\Subcategorie;
use ArticulosReligiosos\Product_img_name;
use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\StoreProductRequest;
use \Gumlet\ImageResize;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
        $this->middleware('check.admin')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retornar vista de catalogo
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::select('id','name')->orderBy('name', 'desc')->get();
        return view('product.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request)
    {
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'pinned' => ($request->pinned != null),
            'slug' => $request->slug,
        ]);
        Subcategorie::find($request->subcategorie_id)->products()->save($product);
        $count = 0;
        foreach ($request->pictures as $picture) {
            $name = time().'_'.$request->slug.'_'.$count.'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path().'/img/', $name);
            $imagecrop = new ImageResize(public_path().'/img/'.$name);
            $originalWidth = $imagecrop->getSourceWidth();
            $imagecrop->crop(300, 300);
            $imagecrop->save(public_path().'/img/crop'.$name);
            if($originalWidth>500){
                $imageresize = new ImageResize(public_path().'/img/'.$name);
                $imageresize->resizeToWidth(500);
                $imageresize->save(public_path().'/img/'.$name);
            }
            $image = new Product_img_name([
                'name' => $name
            ]);
            $product->product_img_names()->save($image);
            $count++;
        }
        return 'Producto guardado';
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
