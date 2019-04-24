<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    protected $table='eventos';


	protected $primaryKey='id';	

	protected $fillable=['nomEvento',
	'descEvento','fechaI','fechaF','eliminado'];
}
