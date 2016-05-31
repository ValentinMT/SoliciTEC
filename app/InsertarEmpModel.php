<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertarEmpModel extends Model
{
    protected $table ="empleado";

    protected $primaryKey = 'clave';

    protected $fillable = ['nombre','tipo','imss','RFC','direccion','telefono','celular','email','password','fechaNacimiento','departamento_clave',]; //fillable <-- Para indicarle que campos quieres llenar.

    public $timestamps = false;
}
