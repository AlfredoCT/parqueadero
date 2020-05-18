<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vehiculo extends Model
{
    protected $fillable = ['idcliente','idcupo','placa','horaentrada','tipovehiculo'];
}
