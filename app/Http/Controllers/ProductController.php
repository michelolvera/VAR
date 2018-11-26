<?php
//Controller que se encarga del CRUD de Productos
namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Product;
use ArticulosReligiosos\Categorie;
use ArticulosReligiosos\Subcategorie;
use ArticulosReligiosos\Comment;
use ArticulosReligiosos\User;
use ArticulosReligiosos\Replie;
use ArticulosReligiosos\Product_img_name;
use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\StoreProductRequest;
use ArticulosReligiosos\Http\Requests\EditProductRequest;
use \Gumlet\ImageResize;
use DB;

class ProductController extends Controller
{
    //Contructor que se basa en middleware de autentificacion y check.admin
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
        //Retorna la vista de productos con todos los productos adjuntos.
        $products = Product::all()->sortBy('name');
        return view('product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna el formulatio de creacion del producto y adjunta las categorias.
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
        //Crea un producto con los datos del request
        $product = new Product([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'discount_percent' => $request->discount_percent,
            'quantity' => $request->quantity,
            'pinned' => ($request->pinned != null),
            'slug' => str_replace(' ', '-', $request->name).'-'.time(),
        ]);
        //Se almacena un producto dentro de su subcategoria.
        Subcategorie::find($request->subcategorie_id)->products()->save($product);
        $count = 0;
        //Almacena cada imagen.
        foreach ($request->pictures as $picture) {
            $name = time().$product->slug.'_'.$count.'.'.$picture->getClientOriginalExtension();
            $picture->move(public_path().'/img/', $name);
            //Convertir imagenes a 2:3 (600*900 preferente)  y miniatura de 1:1 (300*300 preferente) cuadrada
            $image = new ImageResize(public_path().'/img/'.$name);
            $imagesquare = new ImageResize(public_path().'/img/'.$name);
            switch ($request->img_opt) {
                case 0:
                    //Rellenar
                $image->crop(600, 900, $allow_enlarge = True);                    ;
                break;
                case 1:
                    //Expandir
                $image->resize(600, 900, $allow_enlarge = True);
                break;
            }
            $image->save(public_path().'/img/'.$name);
            $imagesquare->crop(300, 300)->save(public_path().'/img/'.'crop'.$name);
            $product_img_name = new Product_img_name([
                'name' => $name
            ]);
            $product->product_img_names()->save($product_img_name);
            $count++;
        }
        //Retorna la vista de productos con todos los productos como adjunto.
        $products = Product::all()->sortBy('name');
        return view('product.index', compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //Retorna una vista que muestra los detalles del producto y se le adjunta el producto en si.
        $users = User::all()->sortBy('id');
        $comments = DB::table('comments')->leftjoin('replies', 'comments.id', '=', 'replies.comment_id')->select('comments.user_id as cuid', 'comments.text as ct', 'replies.user_id as ruid', 'replies.text as rt')->where("product_id",$product->id)->get();
        return view('product.viewProduct', compact('product','comments','users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //Retorna el formulario de edicion de producto.
        return view('product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(EditProductRequest $request, Product $product)
    {
        //Actualizar datos del producto
        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount_percent = $request->discount_percent;
        $product->quantity = $request->quantity;
        foreach ($product->product_img_names()->get() as $img) {
            if($request->input(str_replace('.', '_', $img->name))!= null){
                if (unlink(public_path().'/img/'.$img->name) && unlink(public_path().'/img/crop'.$img->name))
                    $img->delete();
            }
        }
        $count = 0;
        if ($request->pictures != null){
            foreach ($request->pictures as $picture) {
                $name = time().$product->slug.'_'.$count.'.'.$picture->getClientOriginalExtension();
                $picture->move(public_path().'/img/', $name);
                //Convertir imagenes a 2:3 (600*900 preferente)  y miniatura de 1:1 (300*300 preferente) cuadrada
                $image = new ImageResize(public_path().'/img/'.$name);
                $imagesquare = new ImageResize(public_path().'/img/'.$name);
                switch ($request->img_opt) {
                    case 0:
                    //Rellenar
                    $image->crop(600, 900, $allow_enlarge = True);                    ;
                    break;
                    case 1:
                    //Expandir
                    $image->resize(600, 900, $allow_enlarge = True);
                    break;
                }
                $image->save(public_path().'/img/'.$name);
                $imagesquare->crop(300, 300)->save(public_path().'/img/'.'crop'.$name);
                $product_img_name = new Product_img_name([
                    'name' => $name
                ]);
                $product->product_img_names()->save($product_img_name);
                $count++;
            }
        }
        $product->save();
        return view('product.viewProduct', compact('product'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //Elimina cada imagen del producto
        foreach ($product->product_img_names()->get() as $img) {
            if (unlink(public_path().'/img/'.$img->name) && unlink(public_path().'/img/crop'.$img->name))
                $img->delete();
        }
        //Elimina el producto y redirecciona a la lista de productos.
        $product->delete();
        return redirect('product/');
    }
}
