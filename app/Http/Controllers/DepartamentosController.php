<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alert;

class DepartamentosController extends Controller
{
    public function store(Request $request) {
    	$departamento=\DB::table('departamento')->insert([
    		'nombre'=>	$request->nombre,
    		'extension'=>	$request->extension,
    		'edificio'=>$request->edificio,
    		]);

    	if($departamento==1){
	    	Alert::success('¡INSERCIÓN CORRECTA!')->persistent("Cerrar");
	    	return view("website.departamentos");
    	} else  {
    		Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
    	}	
    }
}
