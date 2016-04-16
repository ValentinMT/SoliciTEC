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

Route::get('/departamentos', function() {
	return view('website.departamentos');
});

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

Route::get('/altadepartamentos', function() {
	return view('website.altadepartamentos');
});

Route::post('/departamentos', 'DepartamentosController@store');

Route::get('/indexEmpleado', function() {
	return view('website.indexEmpleado');
});