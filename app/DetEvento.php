<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetEvento extends Model
{
        protected $table='det_eventos';


	protected $primaryKey='id';	

	protected $fillable=['idEdi','idEvento'];
}
