<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\State;
use ArticulosReligiosos\Countrie;
use Illuminate\Http\Request;

class StateController extends Controller
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
            if ($request->countrie_id == null)
                $states = State::all();
            else
                $states = Countrie::find($request->countrie_id)->states()->orderBy('name')->get();
            $states->transform(function ($item, $key){
                return $item->only(['id', 'name']);
            });
            return response()->json($states, 200);
        }
        //Si la solicitud se hace mediante HTTP, se retonara una vista.
        if (!$request->user()->admin)
            abort(401);
        return "Vista de Estados ";
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
     * @param  \ArticulosReligiosos\State  $state
     * @return \Illuminate\Http\Response
     */
    public function show(State $state)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\State  $state
     * @return \Illuminate\Http\Response
     */
    public function edit(State $state)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\State  $state
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, State $state)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\State  $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        //
    }
}
