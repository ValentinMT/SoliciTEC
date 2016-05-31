<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alert;

use Redirect;

use App\InsertarEmpModel;

class JefeEmpleadosController extends Controller
{
    public function index()
    {
        $empleados = InsertarEmpModel::all();
        return view('jefe.empleados', compact('empleados'));
    }

    public function show(Request $request)
    {
    	$depClave = $request->session()->get('jefe')->departamento_clave;
    	//dd($depClave);
        //return InsertarEmpModel::all();
        $empleados=\DB::table('empleado as E')
            ->join('departamento as D', 'E.departamento_clave', '=', 'D.clave')
            ->select('E.clave','E.nombre as NombreE', 'E.tipo', 'E.imss', 'E.RFC', 'E.direccion', 'E.celular', 'E.email', 'D.nombre as NombreD')
            ->where('E.departamento_clave', '=', $depClave) 
            ->Where('E.tipo', '=', '3')
            ->get();
        return $empleados;
    }
}