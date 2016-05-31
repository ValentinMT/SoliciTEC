<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertarQuejaModel extends Model
{
    protected $table ="queja";

    protected $primaryKey = 'folio';

    protected $fillable = ['fechaHora','imagen','descripcion','empleado_clave','empleado_departamento_clave','departamento_clave',]; //fillable <-- Para indicarle que campos quieres llenar.

    public $timestamps = false;
}
