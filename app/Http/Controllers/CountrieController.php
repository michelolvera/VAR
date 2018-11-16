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
            $countries = Countrie::select('id', 'name')->orderBy('name')->get();
            return response()->json($categories, 200);
        }
        $countries = Countrie::all()->sortBy('name');
        return view('countrie.index', compact('countries'));;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('countrie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Countrie::create([
            'name' => $request->name

        ]);
        $countries = Countrie::all()->sortBy('name');
        return view('countrie.index', compact('countries'));
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
        return view('countrie.edit', compact('countrie'));
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
        $countrie->fill($request->all());
        $countrie->save();
        return redirect('countrie/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Countrie $countrie)
    {
        $countrie->delete();
        return redirect('countrie/');
    }
}
