<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Countrie;
use Illuminate\Http\Request;

class CountrieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()){
            $countries = Countrie::all();
            $countries->transform(function ($item, $key){
                return $item->only(['id', 'name']);
            });
            return response()->json($countries, 200);
        }
        return "Countrie View";
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
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function show(Countrie $countrie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function edit(Countrie $countrie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Countrie $countrie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countrie $countrie)
    {
        //
    }
}
