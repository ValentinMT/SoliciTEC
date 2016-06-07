<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsAtendidoModel extends Model
{
    protected $table ="esAtendido";

    protected $primaryKey = 'id';

    protected $fillable = ['solicitudes_folio','queja_folio',]; //fillable <-- Para indicarle que campos quieres llenar.

    public $timestamps = false;
}
