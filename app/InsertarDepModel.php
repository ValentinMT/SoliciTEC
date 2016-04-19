<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertarDepModel extends Model
{
    protected $table ="departamento";

    protected $fillable = ['nombre','extension','edificio',]; //fillable <-- Para indicarle que campos quieres llenar.

    protected $primaryKey = 'clave';
}
