<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Evento;
use App\DetEvento;
use App\Edificio;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $eventos =DB::table('eventos')
        ->where('eliminado',0)
        ->get(); 
        $edificios = Edificio::all();

        return view('admin.eventos' , compact('eventos','edificios','edieventos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $request->validate([
        'nombre'=>'required',
        'descE'=> 'required',
        'fechaI' => 'required|date',
        'fechaF' => 'required|date',
        'edificios' => ''

    ]);
       $evento = new Evento([
        'nomEvento' => $request->get('nombre'),
        'descEvento'=> $request->get('descE'),
        'fechaI'=> $request->get('fechaI'),
        'fechaF'=> $request->get('fechaF'),
        'eliminado'=>'0',


    ]);

       $evento->save();
       $edificio=$_POST['edificios']; 

       for ($i=0;$i<count($edificio);$i++)  
       {  
        DetEvento::create([
            'idEdi'=>$edificio[$i],
            'idEvento'=>$evento->id,
        ]);

    }

    return redirect()->route('evento.index');
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $evento = Evento::find($id);
           // ->get();
        $ediselect= DB::table('det_eventos')
        ->leftJoin('edificios', 'edificios.id', '=', 'det_eventos.idEdi')
        ->where('det_eventos.idEvento',$id)
        ->select('edificios.id','edificios.nombre')
        ->get(); 


        $i=0;
        $idEdi;

        foreach ($ediselect as $edificio) {

            $idEdi[$i]=$edificio->id;
            $i++;
        }

        $edificios=DB::table('edificios')
        ->select('id','nombre')
        ->whereNotIn('id', $idEdi)
        ->get();   


        return view('admin.editarEvento',compact('edificios','evento','ediselect')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre'=>'required',
            'descE'=> 'required',
            'fechaI' => 'required|date',
            'fechaF' => 'required|date',
            'edificios' => ''

        ]);

        $evento = Evento::find($id);

        
        $evento->nomEvento = $request->get('nombre');
        $evento->descEvento= $request->get('descE');
        $evento->fechaI= $request->get('fechaI');
        $evento->fechaF= $request->get('fechaF');

        $evento->save();


        $registros=DetEvento::where('idEvento',$id)->get();


        foreach ($registros as $registro) {
            DetEvento::destroy($registro->id);
        }


        $edificio=$_POST['edificios']; 

        for ($i=0;$i<count($edificio);$i++)  
        {  
            DetEvento::create([
                'idEdi'=>$edificio[$i],
                'idEvento'=>$evento->id,
            ]);

        }

        return redirect()->route('evento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }


    public function eliminar($id)
    {
         $evento = Evento::find($id);
         //dd($evento);
         $evento->eliminado= 1;

        $evento->save();

        return redirect()->route('evento.index');
    }
}
