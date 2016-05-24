<?php

Route::get('/', function () {
    return view('website.index');
});

Route::get('/solicitudes', function() {
	return view('website.solicitudes');
});

Route::get('/quejas', function() {
	return view('website.quejas');
});

Route::get('/empleados', function() {
	return view('website.empleados');
});

/*Route::get('/departamentos', function() {
	return view('website.departamentos');
});*/

Route::get('/acerca', function() {
	return view('website.acerca');
});

Route::get('/acceder', function() {
	return view('website.acceder');
});

Route::get('/registro', function() {
	return view('website.registro');
});

Route::get('/altaempleados', function() {
	return view('website.altaempleados');
});

Route::post('/empleados', 'EmpleadosController@store');

get('/usuario', function(){
	$usuario = \DB::table('empleado')->insert([
    	'tipo' => 1,
    	'nombre' => 'Valentín Torres',
    	'imss'=> '1234567',
    	'RFC'=> 'MATV930916',
    	'direccion'=> 'Pipila #106',
        'telefono'=> '3155606',
        'celular'=> '3121429626',
        'email'=> '12460316@itcolima.edu.mx',
        'password' => \Hash::make('@JVmt1993'),
        'fechaNacimiento' => '1993-09-16',
        'departamento_clave'=> 1
    ]);

    $usuario = \DB::table('empleado')->insert([
    	'tipo' => 2,
    	'nombre' => 'Jesica Coronado',
    	'imss'=> '8912345',
    	'RFC'=> 'JJCA940824',
    	'direccion'=> 'La estancia',
        'telefono'=> '3155329',
        'celular'=> '3121324356',
        'email'=> '12460321@itcolima.edu.mx',
        'password' => \Hash::make('Jesi'),
        'fechaNacimiento' => '1994-08-24',
        'departamento_clave'=> 2
    ]);

    $usuario = \DB::table('empleado')->insert([
    	'tipo' => 3,
    	'nombre' => 'Antonio González',
    	'imss'=> '6789123',
    	'RFC'=> 'JAGO900911',
    	'direccion'=> 'Hidalgo #2',
        'telefono'=> '3153245',
        'celular'=> '3121112469',
        'email'=> '12460323@itcolima.edu.mx',
        'password' => \Hash::make('Pana'),
        'fechaNacimiento' => '1990-09-11',
        'departamento_clave'=> 3
    ]);
    return 'Ok';
});

get('/acceder', 'LoginController@index');

post('/login', 'LoginController@store');

/*Route::get('/indexAdministrador', function() {
    return view('administrador.indexAdministrador');
});*/

get('/administrador/indexAdministrador', 'Admin_UserController@index');

Route::group(['middleware' => 'admin'], function() { 
    get('/administrador', 'Admin_UserController@index');
    get('/logoutAdm', 'Admin_UserController@logout');
    post('/insertarDepto', 'DepartamentosController@store');
    get('/departamentos', 'DepartamentosController@index');
    get('/editarDepto/{clave}', 'DepartamentosController@edit');
    post('/actualizarDepto/update/{clave}', 'DepartamentosController@update');
    get('/eliminarDepto/delete/{clave}', 'DepartamentosController@destroy');
    Route::get('/altadepartamentos', function() {
        return view('website.altadepartamentos');
    });
});

/*Route::get('/indexJefe', function() {
    return view('jefe.indexJefe');
});*/

get('/jefe/indexJefe', 'Jefe_UserController@index');

Route::group(['middleware' => 'jef'], function() { 
    get('/jefe', 'Jefe_UserController@index');
    get('/logoutJef', 'Jefe_UserController@logout');
});

/*Route::get('/indexEmpleado', function() {
    return view('empleado.indexEmpleado');
});*/

get('/empleado/indexEmpleado', 'Emp_UserController@index');

Route::group(['middleware' => 'emp'], function() { 
    get('/empleado', 'Emp_UserController@index');
    get('/logoutEmp', 'Emp_UserController@logout');
	//https://styde.net/sistema-de-autenticacion-de-usuarios-en-laravel/
});