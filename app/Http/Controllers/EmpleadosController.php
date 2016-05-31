<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Alert;

use Redirect;

use App\InsertarEmpModel;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $empleados = InsertarEmpModel::all();
        return view('administrador.empleados', compact('empleados'));
    }

    public function show()
    {
        //return InsertarEmpModel::all();
        $empleados=\DB::table('empleado as E')
            ->join('departamento as D', 'E.departamento_clave', '=', 'D.clave')
            ->select('E.clave','E.nombre as NombreE', 'E.tipo', 'E.imss', 'E.RFC', 'E.direccion', 'E.celular', 'E.email', 'D.nombre as NombreD')
            ->get();
        return $empleados;
    }

    public function store(Request $request) {
        $empleado=\DB::table('empleado')->insert([
            'nombre'=>  $request->nombre,
            'tipo' => $request->tipo,
            'imss'=> $request->imss,
            'RFC'=> $request->RFC,
            'direccion'=> $request->direccion,
            'telefono'=> $request->telefono,
            'celular'=> $request->celular,
            'email'=> $request->email,
            'password' => \Hash::make($request->password),
            'fechaNacimiento' => $request->fechaNacimiento,
            'departamento_clave'=> $request->departamento_clave
            ]);

        if($empleado==1){
            Alert::success('¡INSERCIÓN CORRECTA!')->persistent("Cerrar");
            //return view("administrador.empleados");
            return Redirect::to('/empleados');
        } else  {
            Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
        }   
    }

    public function edit($clave) {
        $empleados = InsertarEmpModel::find($clave);
        return view('administrador.modificarempleados', compact('empleados'));
    }

    public function update($clave, Request $request) {
        $empleados = InsertarEmpModel::find($clave);
        $empleados->fill($request->all());
        $empleados->save();
        Alert::success('¡MODIFICACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/empleados');
    }

    public function destroy($clave) {
        $empleados = InsertarEmpModel::find($clave);
        $empleados->delete();
        Alert::success('¡ELIMINACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/empleados');
    }
}
