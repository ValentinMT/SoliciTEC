<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsertarDepModel extends Model
{
    protected $table ="departamento";

    protected $primaryKey = 'clave';

    protected $fillable = ['nombre','extension','edificio',]; //fillable <-- Para indicarle que campos quieres llenar.

    public $timestamps = false;
}
