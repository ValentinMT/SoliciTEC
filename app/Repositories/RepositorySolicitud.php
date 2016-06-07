<?php

namespace App\Repositories;
use App\InsertarSolicitudModel;

class RepositorySolicitud
{
	static function store($request)
	{
		//dd($request->all());
		$solicitud = new InsertarSolicitudModel;
		$solicitud->problema = $request->problema;
		$solicitud->fechaCaptura =$request->fechaCaptura;
		$solicitud->urgencia = $request->urgencia;
		$solicitud->dptoDestino = $request->dptoDestino;
		$solicitud->claveEmp = $request->claveEmp;
		
		if($solicitud->save()){
			return $solicitud; //retorna toda la instancia (objeto)
		}
			return false;
	}

	static function listaQuejasSolicitudesAdmin()
	{
        $solicitudes=\DB::table('solicitudes as S')
            ->join('departamento as D', 'S.dptoDestino', '=', 'D.clave')
            ->join('esAtendido as eA', 'eA.solicitudes_folio', '=', 'S.folio')
            ->join('queja as Q', 'Q.folio', '=', 'eA.queja_folio')
            ->join('empleado as E', 'E.clave', '=', 'S.claveEmp')
            ->select('S.folio', 'E.nombre as nombreEmp', 'S.fechaCaptura', 'S.problema', 'S.urgencia', 'D.nombre as nombreDpto', 'eA.queja_folio', 'Q.descripcion')
            //->get();
        	->paginate('4');
        //return $solicitudes;   
        return view('administrador.solicitudesAdmin', compact('solicitudes'));
	}
}