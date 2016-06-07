<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use Alert;

use Redirect;

use App\InsertarSolicitudModel;

use App\Http\Controllers\Controller;
use App\Repositories\{RepositorySolicitud, RepositoryquejaFolio, RepositoryMostrarQuejas};

class SolicitudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index()
    { 
        return view('jefe.solicitudes');
    }*/

    public function create()
    {

    }

    public function store(Request $request)
    {
        $depto = $request->session()->get('jefe')->departamento_clave;
        $nombre=\DB::table('departamento')
            ->select('departamento.nombre')
            ->where('departamento.clave','=',$depto)
            ->first();
     
        $nom=\DB::table('departamento')
            ->where('departamento.clave','=',$request->dptoDestino)
            ->select('departamento.nombre')
            ->first();

        $folio_queja = explode(',',$request->folio_quejas); //Array[1, 2, 3]
        $insert = RepositorySolicitud::store($request);
        if(is_object($insert)){
            $quejasFolio = RepositoryquejaFolio::InsertarFolioQueja($folio_queja,$insert);
            $pdf = \PDF::loadView('pdf',compact('insert','quejasFolio','nombre','nom'));
            return $pdf->download('Solicitud.pdf');
            //return view('jefe.solicitudes');
            //return $pdf->stream('documento.pdf');
        }
            return back()->with('error',true);
    }

    public function show(Request $request)
    {
        $depClave = $request->session()->get('jefe')->departamento_clave;
        return RepositoryMostrarQuejas::listaQuejasSolicitud($depClave);
    }

    public function verSolicitudes(Request $request)
    {
        $depClave = $request->session()->get('jefe')->departamento_clave;
        $solicitudes = RepositoryMostrarQuejas::listaSolicitudesJefe($depClave);
        $solicitudes2 = RepositoryMostrarQuejas::listaSolicitudesJefe2($depClave);
        
        return view('jefe.solicitudes', compact('solicitudes','solicitudes2'));
    }

    public function mostrarSolicitudes()
    {
        $solicitudes = RepositorySolicitud::listaQuejasSolicitudesAdmin();
        return view('administrador.solicitudesAdmin', compact('solicitudes'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function marcarAtendida($folio)
    {
        $soliciudes = InsertarSolicitudModel::find($folio);
        $soliciudes->delete();
        Alert::success('¡ATENDIDA!')->persistent("Cerrar");
        return Redirect::to('/jefe/solicitudes');
    }
    public function marcarCancelada($folio)
    {
        $soliciudes = InsertarSolicitudModel::find($folio);
        $soliciudes->delete();
        Alert::success('¡CANCELACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/jefe/solicitudes');
    }

    public function eliminarSolicitud($folio)
    {
        $soliciudes = InsertarSolicitudModel::find($folio);
        $soliciudes->delete();
        Alert::success('¡ELIMINACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/solicitudes');
    }
}
