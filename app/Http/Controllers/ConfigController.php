<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    function edit(){
    	return view('config.edit');
    }
}
