<?php
//Controller que se encarga del CRUD de paises.
namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Countrie;
use ArticulosReligiosos\Http\Requests\CountrieRequest;
use Illuminate\Http\Request;

class CountrieController extends Controller
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
        //En caso de ser una solicitud AJAX, regresa un JSON con la lista de paises
        if($request->ajax()){
            $countries = Countrie::select('id', 'name')->orderBy('name')->get();
            return response()->json($categories, 200);
        }
        //Si es una solicitud de navegador se retorna una vusta con la lista de paises adjunta
        if (!$request->user()->admin)
            abort(401);
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
        //Regresa una vista para crear un pais.
        return view('countrie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountrieRequest $request)
    {
        //Crea un nuevo pais con los datos del request y regresa una vista con la lista de paises.
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
        //Regresa una vista con el formilario para editar el pais.
        return view('countrie.edit', compact('countrie'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Countrie  $countrie
     * @return \Illuminate\Http\Response
     */
    public function update(CountrieRequest $request, Countrie $countrie)
    {
        //Actualiza el pais con los datos del request, retorna una redireccion a la lista de paises.
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
        //Elimina un pais y redireccion a la lista de paises.
        $countrie->delete();
        return redirect('countrie/');
    }
}
