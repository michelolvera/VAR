<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Categorie;
use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\CategorieRequest;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $categories = Categorie::select('name', 'icon', 'slug')->orderBy('name')->get();
            return response()->json($categories, 200);
        }
        $categories = Categorie::all()->sortBy('name');
        return view('categorie.index', compact('categories'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        Categorie::create([
            'name' => $request->name,
            'icon' => $request->icon,
            'slug' => str_replace(' ', '-', $request->name).'-'.time(),
        ]);
        $categories = Categorie::all()->sortBy('name');
        return view('categorie.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Product  $product
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
        $categorie->fill($request->all());
        $categorie->save();
        $categories = Categorie::all()->sortBy('name');
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
        $categorie->delete();
        return redirect('categorie/');
    }
}
