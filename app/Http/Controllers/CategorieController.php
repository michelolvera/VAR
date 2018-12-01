<?php
/*
    Controller que se encarga de todos el CRUD de los productos, cada funcion de este define su accion.
*/
namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Categorie;
use ArticulosReligiosos\Subcategorie;
use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
        $this->middleware('check.admin')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //En caso de ser una solicitud AJAX, se retornaran las categorias en forma de JSON
        if($request->ajax()){
            $categories = Categorie::select('name', 'icon', 'slug')->orderBy('name')->get();
            return response()->json($categories, 200);
        }
        if (!$request->user()->admin)
            abort(401);
        $categories = Categorie::all()->sortBy('name');
        //Se retornara una vista y a esta se le adjuntaran las categorias.
        return view('categorie.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Se retorna el formulario para crear categoria
        return view('categorie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategorieRequest $request)
    {
        /*
            Se crea una categoria con los datos del Request
            Se crea una subcategoria llamada 'Sin subcategoría',
            solo en caso de que el producto a crear no tenga una categoria
        */
        $categorie = Categorie::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => str_replace(' ', '-', $request->name).'-'.time(),
        ]);
        $categorie->subcategories()->save(new Subcategorie([
            'name' => 'Sin subcategoría',
            'slug' => str_replace(' ', '-', 'Sin subcategoría').'-'.time(),
        ]));
        $categories = Categorie::all()->sortBy('name');
        return view('categorie.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function show(Categorie $categorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Categorie $categorie)
    {
        //Regresa una vista a la cual se le adjunta la categoria especifica.
        return view('categorie.edit', compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function update(CategorieRequest $request, Categorie $categorie)
    {
        // Se actualiza la categoria con los datos del reuqest y se redirecciona a la lista de categorias.
        $categorie->fill($request->all());
        $categorie->save();
        return redirect('categorie/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Categorie  $categorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Categorie $categorie)
    {
        //Elimina la subcategoria seleccionada y redirecciona a la lista de categorias.
        $categorie->delete();
        return redirect('categorie/');
    }
}
