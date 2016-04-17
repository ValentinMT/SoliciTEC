<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {
        $departamento=\DB::table('departamento')->insert([
            'tipo' => $request->tipo,
            'nombre'=>  $request->nombre,
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

        if($departamento==1){
            Alert::success('¡INSERCIÓN CORRECTA!')->persistent("Cerrar");
            return view("website.empleados");
        } else  {
            Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
        }   
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
