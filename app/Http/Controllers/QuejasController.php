<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Alert;

use Redirect;

use App\InsertarQuejaModel;

use App\Helpers\Filesystem;
use App\Repositories\{RepositoryQuejas,RepositoryMostrarQuejas};

class QuejasController extends Controller
{
    /*
    public function index() {
        $quejas = InsertarQuejaModel::all();
        return view('administrador.quejasAdmin', compact('quejas'));
    }
    */

    public function quejasEmp() {
        //$quejas2 = InsertarQuejaModel::all();
        return view('empleado.altaquejas'); //, compact('quejas2'));
    }

    public function quejasJefe() {
        $quejas2 = InsertarQuejaModel::all();
        $quejas3 = InsertarQuejaModel::all();
        return view('jefe.quejasJefe', compact('quejas2','quejas3'));
    }

    public function store(Request $request){

        $file = $request->file('imagen');
        
        if ($request->hasFile('imagen')) {
            $filesystem = Filesystem::upload($file);
            if(!$filesystem){
                return back()->with('error-file', true);
            }
            //Una vez almacenado lo insertamos en la DB.
            $insert = RepositoryQuejas::store($request, $filesystem);

            if(is_object($insert)){
                //$autores_libros = RepositoryAutorLibro::InsertAutoresLibros($id_autor, $insert);
                //return back()->with('success',true);
                Alert::success('¡ENVÍO CORRECTO!')->persistent("Cerrar");
                return Redirect::to('/empleados/quejas');
            } else  {
                Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
            }
            return back()->with('error',false);
        } else {
            if(InsertarQuejaModel::create($request->all())){
                Alert::success('¡ENVÍO CORRECTO!')->persistent("Cerrar");
                return Redirect::to('/empleados/quejas');
            
            } else  {
                Alert::error('ERROR DE INSERCIÓN, INTENTELO NUEVAMENTE', 'Oops!')->persistent("Cerrar");
            }
        }
        return back()->with('error-file', true);
    }

    public function show()
    {
        return RepositoryMostrarQuejas::listaQuejasAdmin(); 
    }

    public function mostrarQuejasRealizadas(Request $request)
    {
        $depClave = $request->session()->get('jefe')->departamento_clave;
        return RepositoryMostrarQuejas::listaQuejasRealizadas($depClave);
    }

    public function mostrarQuejasRecibidas(Request $request)
    {
        $depClave = $request->session()->get('jefe')->departamento_clave;
        return RepositoryMostrarQuejas::listaQuejasRecibidas($depClave);
    }

    public function destroy($folio) {
        $quejas = InsertarQuejaModel::find($folio);
        $quejas->delete();
        Alert::success('¡ELIMINACIÓN CORRECTA!')->persistent("Cerrar");
        return Redirect::to('/quejas');
        //return view("administrador.quejas");
    }

    public function detalle(Request $request)
    {
        //return $request->all();
        $queja = RepositoryMostrarQuejas::detalleQueja($request);
        return compact('queja');
    }
}
