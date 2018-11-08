<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Subcategorie;
use ArticulosReligiosos\Categorie;
use Illuminate\Http\Request;

class SubcategorieController extends Controller
{
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
                return $item->only(['id', 'name']);
            });
            return response()->json($subcategorie, 200);
        }
        //Si la solicitud se hace mediante HTTP, se retonara una vista.
        return "Vista de subcategorias ";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function show(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subcategorie $subcategorie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Subcategorie  $subcategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subcategorie $subcategorie)
    {
        //
    }
}
