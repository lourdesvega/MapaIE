<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edificio;
use App\Servicio;

class BusquedaController extends Controller
{
	public function busquedas(){
        return view('busquedas');
    }

    public function rbusquedas(Request $request){
        /*
        $request->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'estatus'=>'required',
    ]);

    $user = User::find($id);
    //dd($user);
      $user->name = $request->get('name');
      $user->email = $request->get('email');
      $user->password = $request->get('password');
      $user->estatus = $request->get('estatus');
      $user->save();

        */

      if($request->get('buscar')=='edificio' || $request->get('buscar')=='edificios'){
        $edificios = Edificio::all();
    }
    else{
      $edificios = Edificio::where('descE', 'LIKE', '%'.$request->get('buscar').'%')
      ->orWhere('nombre', 'LIKE', '%'.$request->get('buscar').'%')
      ->get();
  }  


  if($request->get('buscar')=='servicio' || $request->get('buscar')=='servicios'){
    $servicios = Servicio::all();
}
else{

  $servicios = Servicio::where('descS', 'LIKE', '%'.$request->get('buscar').'%')
  ->orWhere('nomServicio', 'LIKE', '%'.$request->get('buscar').'%')
  ->get();
}

return view('busquedas', compact('edificios','servicios'));

}

public function search(){ 


 return view ('busqueda');

}

public function autocomplete(Request $request)
{
    	//$request='Salones';
 return Edificio::where('descE', 'LIKE', '%'.$request->get('buscar').'%')->get();
    	//dd
    	// $search = $request->get('term');
    	//$result=Edificio::where('descE', 'LIKE', '%'.$request->q.'%')->get();
    	// return response()->json($result);
}

public function resultadoEdi($id){
    $edificio = Edificio::find($id);

    $fotos = DB::table('fotos')
    ->where('idEdi', $edificio->id)
    ->get();

    $infrae =DB::table('infrae')
    ->join('tipo_inf','infrae.idTipoI','tipo_if.id')
    ->where('infrae.idEdi',$edificio->id)
    ->get();

    return view('resultadoE',compact('edificio','fotos','infrae'));
}

public function resultadoSer($id){
    $servicio = Servicio::find($id);

    $edificio = Edificio::find($servicio->idEdi);

    $fotos = DB::table('fotos')
    ->where('idEdi', $edificio->id)
    ->get();


   return view('resultadoS',compact('edificio','fotos','servicio'));
}
}
