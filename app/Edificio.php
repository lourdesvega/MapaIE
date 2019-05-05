<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Edificio extends Model
{
    protected $table='edificios';


	protected $primaryKey='id';	

	protected $fillable=['nombre',
	'descE','latitud','longitud','etiquetas'];
}
