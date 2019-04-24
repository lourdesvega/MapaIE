<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    protected $table='servicios';

	protected $primaryKey='id';	

	protected $fillable=['nomServicio','horaI', 'horaF', 'responsable', 'telefono', 'descS', 'planta', 'idEdi'];
}
