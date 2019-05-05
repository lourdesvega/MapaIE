<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Edificio;
use App\Servicio;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
    


      $edificios = Edificio::where('etiquetas', 'LIKE', '%'.$request->get('buscar').'%')
      ->get();



  if($request->get('buscar')=='servicio' || $request->get('buscar')=='servicios'){
    $servicios = Servicio::all();
}
else{

  $servicios = Servicio::where('descS', 'LIKE', '%'.$request->get('buscar').'%')
  ->orWhere('nomServicio', 'LIKE', '%'.$request->get('buscar').'%')
  ->get();
}

      $infrae = DB::table('tipo_inf')
      ->join('infrae','infrae.idTipoI','tipo_inf.id')
      ->join('edificios','infrae.idEdi','edificios.id')
      ->where('tipo_inf.etiquetasI','LIKE', '%'.$request->get('buscar').'%')
      ->get();

return view('busquedas', compact('edificios','servicios','infrae'));
//}


}

public function search(){ 
   $eventos=DB::table('eventos')
          ->where( 'fechaI', '>=', Carbon::now())
          ->where('fechaF', '>=', Carbon::now())
           ->where('eliminado',0)
           ->get();
           //dd($evento);

//foreach ($variable as $key => $value) {
//  # code...
//}


    
//    dd($edificios);             


 return view ('busqueda',compact('eventos'));

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
    ->join('tipo_inf','infrae.idTipoI','tipo_inf.id')
    ->where('infrae.idEdi',$edificio->id)
    ->get();

    return view('resultadoE',compact('edificio','fotos','infrae'));
}

public function resultado(){


    return view('resultado');
    
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
