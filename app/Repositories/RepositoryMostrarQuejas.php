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

    static function listaQuejasSolicitud($depClave)
    {
        $quejaVehiculares=\DB::table('queja')
            ->select('queja.descripcion','queja.folio')
            ->where('queja.problema','=','1') 
            ->where('queja.departamento_clave','=',$depClave)
            ->get();

        $quejas1=\DB::table('queja')
            ->select('queja.descripcion','queja.folio')
            ->where('queja.problema','=','2') 
            ->where('queja.departamento_clave','=',$depClave)
            ->get();

        $quejas2=\DB::table('queja')
            ->select('queja.descripcion','queja.folio')
            ->where('queja.problema','=','3') 
            ->where('queja.departamento_clave','=',$depClave)
            ->get();

        $quejas3=\DB::table('queja')
            ->select('queja.descripcion','queja.folio')
            ->where('queja.problema','=','4') 
            ->where('queja.departamento_clave','=',$depClave)
            ->get();

        $solicitudes=\DB::table('solicitudes as S')
            ->join('departamento as D', 'S.dptoDestino', '=', 'D.clave')
            ->join('esAtendido as eA', 'eA.solicitudes_folio', '=', 'S.folio')
            ->join('queja as Q', 'Q.folio', '=', 'eA.queja_folio')
            ->select('S.folio', 'S.fechaCaptura', 'S.problema', 'S.urgencia', 'D.nombre', 'eA.queja_folio', 'Q.descripcion')
            ->where('Q.departamento_clave', '=', $depClave) 
            ->get();

        $solicitudes2=\DB::table('solicitudes as S')
            ->join('departamento as D', 'S.dptoDestino', '=', 'D.clave')
            ->join('esAtendido as eA', 'eA.solicitudes_folio', '=', 'S.folio')
            ->join('queja as Q', 'Q.folio', '=', 'eA.queja_folio')
            ->select('S.folio', 'S.fechaCaptura', 'S.problema', 'S.urgencia', 'D.nombre', 'eA.queja_folio', 'Q.descripcion')
            ->where('S.dptoDestino', '=', $depClave) 
            ->get();
             
       return compact('quejaVehiculares', 'quejas1', 'quejas2', 'quejas3', 'solicitudes', 'solicitudes2');
    }
}