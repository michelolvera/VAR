<?php

namespace ArticulosReligiosos\Http\Controllers;

use Illuminate\Http\Request;
use ArticulosReligiosos\Http\Requests\AppConfigRequest;
use ArticulosReligiosos\App_config;

class ConfigController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check.admin');
    }

    function edit(){
    	$config = App_config::first();
    	return view('config.edit', compact('config'));
    }

    function update(AppConfigRequest $request){
    	$config = App_config::first();
    	if($request->hasFile('store_logo')){
    		@unlink(public_path().'/img/'.$config->store_logo);
    		$name = time().'logo_.'.$picture->getClientOriginalExtension();
            $picture->move(public_path().'/img/', $name);
            $config->store_logo = $name;
    	}
    	$config->fill($request->all());
    	$config->save();
    	return view('config.edit', compact('config'));
    }
}
