<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alert;

use Redirect;

use App\InsertarQuejaModel;

class QuejasController extends Controller
{
    public function index() {
        $quejas = InsertarQuejaModel::all();
        return view('administrador.quejas', compact('quejas'));
    }

    public function show()
    {
        //return InsertarQuejaModel::all();
        $quejas=\DB::table('queja as Q')
            ->join('empleado as E', 'Q.empleado_clave', '=', 'E.clave')
            ->join('departamento as D', 'Q.empleado_departamento_clave', '=', 'D.clave')
            ->join('departamento as DD', 'Q.departamento_clave', '=', 'DD.clave')
            ->select('Q.folio','Q.fechaHora', 'Q.imagen', 'Q.descripcion', 'E.nombre as empleado_clave', 'D.nombre as empleado_departamento_clave', 'DD.nombre as departamento_clave')
            ->get();
        return $quejas;       
    }

    public function destroy($folio) {
        $quejas = InsertarQuejaModel::find($folio);
        $quejas->delete();
        Alert::success('¡ELIMINACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/quejas');
        //return view("administrador.quejas");
    }
}
