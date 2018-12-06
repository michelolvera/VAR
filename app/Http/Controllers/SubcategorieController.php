<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Subcategorie;
use ArticulosReligiosos\Categorie;
use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\SubcategorieRequest;
use Illuminate\Support\Facades\Auth;

class SubcategorieController extends Controller
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
        if($request->ajax()){
            if ($request->categorie_id == null)
                $subcategorie = Subcategorie::all();
            else
                $subcategorie = Categorie::find($request->categorie_id)->subcategories()->orderBy('name')->get();
            $subcategorie->transform(function ($item, $key){
                return $item->only(['id', 'name', 'slug']);
            });
            return response()->json($subcategorie, 200);
        }
        //Si la solicitud se hace mediante HTTP, se retonara una vista.
        if (!Auth::check() || !$request->user()->admin)
            abort(401);
        $subcategories = Subcategorie::all()->sortBy('name');
        return view('subcategorie.index', compact('subcategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categorie::all()->sortBy('name');
        return view('subcategorie.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategorieRequest $request)
    {
        Categorie::find($request->categorie_id)->subcategories()->save(new Subcategorie([
            'name' => $request->name,
            'slug' => str_replace(' ', '-', $request->name).'-'.time(),
        ]));
        return redirect('/subcategorie');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategorie $subcategorie)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategorie $subcategorie)
    {
        $categories = Categorie::all()->sortBy('name');
        return view('subcategorie.edit', compact('subcategorie', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(SubcategorieRequest $request, Subcategorie $subcategorie)
    {
        $subcategorie->name = $request->name;
        $subcategorie->categorie()->associate(Categorie::find($request->categorie_id));
        $subcategorie->save();
        return redirect('subcategorie/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategorie $subcategorie)
    {
        $subcategorie->delete();
        return redirect('subcategorie/');
    }
}
