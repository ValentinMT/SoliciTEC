<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alert;

use Redirect;

use App\InsertarDepModel;

class DepartamentosController extends Controller
{
    public function index() {
        $departamentos = InsertarDepModel::all();
        return view('website.departamentos', compact('departamentos'));
    }

    public function store(Request $request) {
    	/*
        $departamento=\DB::table('departamento')->insert([
    		'nombre'=>	$request->nombre,
    		'extension'=>	$request->extension,
    		'edificio'=>$request->edificio,
    		]);
        */
        if(InsertarDepModel::create($request->all())){
	    	Alert::success('¡INSERCIÓN CORRECTA!')->persistent("Cerrar");
	    	return Redirect::to('/departamentos');
    	} else  {
    		Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
    	}  
    }

    public function edit($clave) {
        $departamentos = InsertarDepModel::find($clave);
        return view('website.modificardepartamentos', compact('departamentos'));
    }

    public function update($clave, Request $request) {
        $departamentos = InsertarDepModel::find($clave);
        $departamentos->fill($request->all());
        $departamentos->save();
        Alert::success('¡MODIFICACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/departamentos');
    }

    public function destroy($clave) {
        $departamentos = InsertarDepModel::find($clave);
        $departamentos->delete();
        Alert::success('¡ELIMINACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/departamentos');
    }
}