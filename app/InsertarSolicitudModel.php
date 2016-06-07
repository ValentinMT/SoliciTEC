<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertarSolicitudModel extends Model
{
   	protected $table ="solicitudes";

    protected $primaryKey = 'folio';

    protected $fillable = ['problema','fechaCaptura','urgencia','dptoDestino','claveEmp',]; //fillable <-- Para indicarle que campos quieres llenar.

    public $timestamps = false;
}
