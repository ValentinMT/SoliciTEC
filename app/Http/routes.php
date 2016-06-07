<?php

Route::get('/', function () {
    return view('website.index');
});

Route::get('/acerca', function() {
    return view('website.acerca');
});

Route::get('/quejas', function() {
    return view('administrador.quejas');
});

Route::get('/acceder', function() {
	return view('website.acceder');
});

Route::get('/registro', function() {
	return view('website.registro');
});

Route::get('/usuario', function(){
	$usuario = \DB::table('empleado')->insert([
    	'tipo' => 1,
    	'nombre' => 'Valentín Torres',
    	'imss'=> '30038010705',
    	'RFC'=> 'MATV930916',
    	'direccion'=> 'Pipila #106',
        'telefono'=> '3155606',
        'celular'=> '3121429626',
        'email'=> '12460316@itcolima.edu.mx',
        'password' => \Hash::make('Valentin'),
        'fechaNacimiento' => '1993-09-16',
        'departamento_clave'=> 4
    ]);

    $usuario = \DB::table('empleado')->insert([
    	'tipo' => 2,
    	'nombre' => 'Jesica Coronado',
    	'imss'=> '30038010707',
    	'RFC'=> 'JJCA940824',
    	'direccion'=> 'La estancia',
        'telefono'=> '3155329',
        'celular'=> '3121324356',
        'email'=> '12460321@itcolima.edu.mx',
        'password' => \Hash::make('Jesi'),
        'fechaNacimiento' => '1994-08-24',
        'departamento_clave'=> 5
    ]);

    $usuario = \DB::table('empleado')->insert([
    	'tipo' => 3,
    	'nombre' => 'Antonio González',
    	'imss'=> '30038010712',
    	'RFC'=> 'JAGO900911',
    	'direccion'=> 'Hidalgo #2',
        'telefono'=> '3153245',
        'celular'=> '3121112469',
        'email'=> '12460323@itcolima.edu.mx',
        'password' => \Hash::make('Pana'),
        'fechaNacimiento' => '1990-09-11',
        'departamento_clave'=> 6
    ]);
    return 'Ok';
});

Route::get('/acceder', 'LoginController@index');

Route::post('/login', 'LoginController@store');

Route::group(['middleware' => 'admin'], function() {
    Route::get('/administrador/indexAdministrador', 'Admin_UserController@index');
    Route::get('/logoutAdm', 'Admin_UserController@logout');

    Route::get('/acerca/administrador', function() {
        return view('administrador.acerca');
    });

    Route::post('/insertarDepto', 'DepartamentosController@store');
    Route::get('/departamentos', 'DepartamentosController@index');
    Route::get('/editarDepto/{clave}', 'DepartamentosController@edit');
    Route::post('/actualizarDepto/update/{clave}', 'DepartamentosController@update');
    Route::get('/eliminarDepto/delete/{clave}', 'DepartamentosController@destroy');
    Route::get('/altadepartamentos', function() {
        return view('administrador.altadepartamentos');
    });
    Route::get('/administrador/departamentos', 'DepartamentosController@show');

    Route::post('/insertarEmp', 'EmpleadosController@store');
    Route::get('/empleados', 'EmpleadosController@show');
    Route::get('/editarEmp/{clave}', 'EmpleadosController@edit');
    Route::post('/actualizarEmp/update/{clave}', 'EmpleadosController@update');
    Route::get('/eliminarEmp/delete/{clave}', 'EmpleadosController@destroy');
    Route::get('/altaempleados', function() {
        return view('administrador.altaempleados');
    });
    Route::get('/administrador/empleados', 'EmpleadosController@show');

    Route::get('/quejas', 'QuejasController@show');
    //Route::get('/eliminarQueja/delete/{folio}', 'QuejasController@destroy');
    Route::get('/detalle-queja', 'QuejasController@detalle');

    Route::get('/solicitudes', 'SolicitudController@mostrarSolicitudes');
    Route::get('/eliminarSolicitudAdmin/delete/{folio}', 'SolicitudController@eliminarSolicitud');
    Route::get('/genPDF/{folio}', 'PrintController@genPDFAdmin');
});

Route::group(['middleware' => 'jef'], function() { 
    Route::get('/jefe/indexJefe', 'Jefe_UserController@index');
    Route::get('/logoutJef', 'Jefe_UserController@logout');

    Route::get('/acerca/jefe', function() {
        return view('jefe.acerca');
    });

    Route::get('/jefe/empleados', 'JefeEmpleadosController@index');
    Route::get('/jefe/empleados/mostrar', 'JefeEmpleadosController@show');

    Route::get('/quejasJefe', 'QuejasController@quejasJefe');
    Route::get('/jefe/quejas2', 'QuejasController@mostrarQuejasRealizadas');
    Route::get('/jefe/quejas3', 'QuejasController@mostrarQuejasRecibidas');

    Route::get('/jefe/solicitudes', 'SolicitudController@verSolicitudes');
    Route::get('/altasolicitudes', function() {
        return view('jefe.altasolicitudes');
    });
    Route::post('/registrar', 'SolicitudController@store');
    //Route::get('/pdf', 'PrintController@index');
    Route::get('/Solicitud-jefe', 'SolicitudController@show');

    //Route::get('/SolicitudesTotal', 'SolicitudController@verSolicitudes');

    //Route::get('/eliminarQueja/delete/{folio}', 'QuejasController@destroyQuejaJefe');
    Route::get('/cancelarSolicitud/delete/{folio}', 'SolicitudController@marcarCancelada');
    Route::get('/atenderSolicitud/delete/{folio}', 'SolicitudController@marcarAtendida');

    Route::get('/genPDFRecibidas/{folio}', 'PrintController@genPDFRecibidas');
    Route::get('/genPDFRealizadas/{folio}', 'PrintController@genPDFRealizadas');
});

Route::group(['middleware' => 'emp'], function() { 
    Route::get('/empleado/indexEmpleado', 'Emp_UserController@index');
    Route::get('/logoutEmp', 'Emp_UserController@logout');

    Route::get('/acerca/empleado', function() {
        return view('empleado.acerca');
    });

    Route::get('/empleados/quejas', 'QuejasController@quejasEmp');
    Route::post('/insertarQueja', 'QuejasController@store');
	//https://styde.net/sistema-de-autenticacion-de-usuarios-en-laravel/
});