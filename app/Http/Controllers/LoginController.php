<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request)
    {
        if(Auth::check()){
            //Usuario administrador.
            $tipo_usuario = Auth::user()->tipo; //Datos del usuario (tipo).
            if($tipo_usuario == 1){
                return redirect('/administrador');
            } else {
                //Usuario jefe.
                if($tipo_usuario == 2) {
                    return redirect('/jefe');
                } else {
                    //Usuario empleado.
                    return redirect('/empleado');
                }
                
            }
        }
        //Muestra el formulario de login.
        return view('website.acceder');
    }

    public function store(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $usuario = Auth::user();
            $tipo_usuario = Auth::user()->tipo; //Datos del usuario (tipo).
            //dd($tipo_usuario);
            if($tipo_usuario == 1){
                $request->session()->put('administrador', $usuario);
                return redirect('/administrador');
            } else {
                if($tipo_usuario == 2){
                    $request->session()->put('jefe', $usuario);
                    return redirect('/jefe');
                } else {
                    //Usuario cliente.
                    $request->session()->put('empleado', $usuario);
                    return redirect('/empleado');
                }
            } 
        }
        return back();
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
