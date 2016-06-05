<?php

namespace App\Repositories;
use App\InsertarQuejaModel;

class RepositoryQuejas
{
	static function store($request, $path)
	{
		//dd($request->all());
		$queja = new InsertarQuejaModel;
		$queja->fechaHora = $request->fecha;
		$queja->imagen = $path;
		$queja->descripcion = $request->descripcion;
		$queja->empleado_clave = $request->empleado_clave;
		$queja->empleado_departamento_clave = $request->empleado_departamento_clave;
		$queja->departamento_clave = $request->departamento_clave;
		$queja->problema = $request->problema;
		if($queja->save()){
			return $queja; //retorna toda la instancia (objeto)
		}
		return false;
	}
}