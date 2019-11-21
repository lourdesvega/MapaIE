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



      $edificios = Edificio::where('etiquetas', 'LIKE', '%'.$request->get('buscar').'%')
      ->get();





      $servicios = DB::table('servicios')
      ->join('edificios','edificios.id','servicios.idEdi')
      ->where('descS', 'LIKE', '%'.$request->get('buscar').'%')
      ->orWhere('nomServicio', 'LIKE', '%'.$request->get('buscar').'%')
      ->select('edificios.foto','servicios.*')
      ->get();


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
     ->Orwhere('fechaF', '>=', Carbon::now())
     ->where('eliminado',0)
     ->get();

     return view ('busqueda',compact('eventos'));


   }

   public function autocomplete(Request $request)
   {
    	//$request='Salones';
     return Edificio::where('descE', 'LIKE', '%'.$request->get('buscar').'%')->get();
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

    public function autocomplete1(Request $request)
    {
        $clients = Edificio::where('nombre',
            'like',
            '%' . $request->get('query') . '%'
        )->get();

        $data = array();
        foreach ($clients as $client) {
            array_push($data,
                ['value' =>
                    $client->nombre ,
                    'data' => $client->id . ""]);
        }

        return response()->json([
            "query" => "Unit",
            "suggestions" => $data,
        ]);
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
