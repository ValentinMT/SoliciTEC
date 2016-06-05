<?php

namespace App\Repositories;
use App\InsertarQuejaModel;

class RepositoryMostrarQuejas
{
	static function listaQuejasAdmin()
	{
		//return InsertarQuejaModel::all();
        $quejas = \DB::table('queja as Q')
            ->join('empleado as E', 'Q.empleado_clave', '=', 'E.clave')
            ->join('departamento as D', 'Q.empleado_departamento_clave', '=', 'D.clave')
            ->join('departamento as DD', 'Q.departamento_clave', '=', 'DD.clave')
            ->select('Q.folio','Q.fechaHora', 'Q.imagen', 'Q.descripcion', 'E.nombre as empleado_clave', 'D.nombre as empleado_departamento_clave', 'DD.nombre as departamento_clave', 'Q.problema')
            //->get();
            ->paginate('4');
        //return $quejas;   
        return view('administrador.quejasAdmin', compact('quejas'));   
	}

    static function detalleQueja($request)
    {
        //return InsertarQuejaModel::all();
        $quejas = \DB::table('queja as Q')
            ->join('empleado as E', 'Q.empleado_clave', '=', 'E.clave')
            ->join('departamento as D', 'Q.empleado_departamento_clave', '=', 'D.clave')
            ->join('departamento as DD', 'Q.departamento_clave', '=', 'DD.clave')
            ->select('Q.folio','Q.fechaHora', 'Q.imagen', 'Q.descripcion', 'E.nombre as empleado_clave', 'D.nombre as empleado_departamento_clave', 'DD.nombre as departamento_clave', 'Q.problema')
            ->where('Q.folio', '=', $request->folio)
            ->first();
        return $quejas;  
    }

	static function listaQuejasRealizadas($depClave)
	{
        //return InsertarQuejaModel::all();
        $quejas2 = \DB::table('queja as Q')
            ->join('empleado as E', 'Q.empleado_clave', '=', 'E.clave')
            ->join('departamento as D', 'Q.empleado_departamento_clave', '=', 'D.clave')
            ->join('departamento as DD', 'Q.departamento_clave', '=', 'DD.clave')
            ->select('Q.folio','Q.fechaHora', 'Q.imagen', 'Q.descripcion', 'E.nombre as empleado_clave', 'D.nombre as empleado_departamento_clave', 'DD.nombre as departamento_clave', 'Q.problema')
            ->where('E.departamento_clave', '=', $depClave) 
            ->get();
        return $quejas2;
	}

	static function listaQuejasRecibidas($depClave)
	{
		//return InsertarQuejaModel::all();
        $quejas3 = \DB::table('queja as Q')
            ->join('empleado as E', 'Q.empleado_clave', '=', 'E.clave')
            ->join('departamento as D', 'Q.empleado_departamento_clave', '=', 'D.clave')
            ->join('departamento as DD', 'Q.departamento_clave', '=', 'DD.clave')
            ->select('Q.folio','Q.fechaHora', 'Q.imagen', 'Q.descripcion', 'E.nombre as empleado_clave', 'D.nombre as empleado_departamento_clave', 'DD.nombre as departamento_clave', 'Q.problema')
            ->where('Q.departamento_clave', '=', $depClave) 
            ->get();
        return $quejas3;
    }
}