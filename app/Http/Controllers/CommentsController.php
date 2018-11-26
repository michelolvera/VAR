<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Comment;
use ArticulosReligiosos\Http\Requests\CommentsRequest;
use ArticulosReligiosos\Product;
use DB;

class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store(CommentsRequest $request)
    {
        //
        
        // DB::create([
        //     'title' => $request->title,
        //     'text' => $request->text,
        //     'user_id' => $request->user_id,
        //     'product_id' => $request->product_id
        // ]);
        $timestamp = date("Y-m-d H:i:s");
        DB::table('comments')->insert([
            'title' => $request->title, 'text' => $request->text, 'user_id' => $request->user_id,'product_id' => $request->product_id, 'created_at' => $timestamp, 'updated_at' => $timestamp
        ]);
        return "En proceso";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
