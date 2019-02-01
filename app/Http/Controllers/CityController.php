<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\City;
use ArticulosReligiosos\State;
use ArticulosReligiosos\Http\Requests\CityRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax() && $request->isAjax){
            if ($request->state_id == null)
                $cities = City::all();
            else
                $cities = State::find($request->state_id)->cities()->select('id', 'name')->orderBy('name')->get();
            return response()->json($cities, 200);
        }
        //Si la solicitud se hace mediante HTTP, se retonara una vista.
        if (!Auth::check() || !$request->user()->admin)
            abort(401);
        $cities = City::all()->sortBy('name');
		return view('city.index', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $states = State::all()->sortBy('name');
		return view('city.create', compact('states'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityRequest $request)
    {
        State::find($request->state_id)->cities()->save(new City([
            'name' => $request->name,
            'shipping_cost' => $request->shipping_cost
        ]));
        return redirect('/city');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::all()->sortBy('name');
		return view('city.edit', compact('city', 'states'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(CityRequest $request, City $city)
    {
        $city->name = $request->name;
        $city->shipping_cost = $request->shipping_cost;
        $city->state()->associate(State::find($request->state_id));
        $city->save();
        return redirect('city/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        $city->delete();
        return redirect('city/');
    }
}
