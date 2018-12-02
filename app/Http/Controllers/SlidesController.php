<?php

namespace ArticulosReligiosos\Http\Controllers;

use ArticulosReligiosos\Slide;
use Illuminate\Http\Request;

class SlidesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides  = Slide::all()->sortBy('created_at');
        return view('slide.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('slide.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $slide = new Slide([
            'title' => $request->title,
            'text' => $request->text,
        ]);
        if ($request->redirect!=null){
            $slide->redirect = $request->redirect;
        }
        if($request->hasFile('img_url')){
            $picture = $request->file('img_url');
    		$name = time().'slide_.'.$picture->getClientOriginalExtension();
            $picture->move(public_path().'/img/', $name);
            $slide->img_url = $name;
            $slide->save();
    	}
        return redirect('slide/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \ArticulosReligiosos\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        abort(404);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \ArticulosReligiosos\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \ArticulosReligiosos\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \ArticulosReligiosos\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slide $slide)
    {
        //
    }
}
