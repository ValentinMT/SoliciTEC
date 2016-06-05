<?php

namespace App\Helpers;

class Filesystem 
{
	static function upload($file)
	{
		$path = '/imagenes/quejas';
        $nombre = $file->getClientOriginalName(); //Obtiene el nombre de la imagen.
        if($file->move(public_path().$path, $nombre)){ //Sube y almacena la imagen a la carpeta indicada (UPLOAD).
            //$ruta = $path.'/'.$nombre; //Ruta que se almacena en la base.
            return $path .= '/'.$nombre;
        }
        return $path = false;
	}
}