<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientes extends Model
{
    protected $fillable = ['tipodocumento', 'numerodocumento', 'nombre', 'apellido','telefono'];
}
