<?php

namespace App\Http\Controllers\Seguimiento;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Personal;
use App\Models\Administracion\Estatus;
use App\Models\Administracion\Tipo_correspondencia;
use App\Models\Administracion\Area_trabajo;
use App\Models\Administracion\Ente;
use App\Models\Administracion\Nomenclatura;
use App\Models\Seguimiento\Registro;
use App\Models\Documento;
use App\Models\Seguimiento\VNomenclatura_correlativo;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;



class SeguimientoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return response()->json(view('seguimiento.listado')->render());
        }
        $personal = Personal::pluck('ci','nombre','apellido', 'id_personal');
        $tipo_correspondencia = Tipo_correspondencia::pluck('descripcion','id_tipo_correspondencia');
        $area_trabajo = Area_trabajo::pluck('descripcion','id_area_trabajo');
        $ente = Ente::pluck('descripcion','id_ente');
        $nomenclatura = Nomenclatura::pluck('descripcion','id_nomenclatura');
        //$vnomenclatura_correlativo = VNomenclatura_correlativo::pluck( 'id_nomenclatura' ,'descripcion','MAX');

        return view('seguimiento.index', compact('personal','tipo_correspondencia','area_trabajo','ente','nomenclatura'/* ,'vnomenclatura_correlativo' */));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        
        $rules = [

            'ci' => 'required|numeric',
          
            
          
        ];

        $messages = [

            'ci.required' => 'La cédula es obligatoria.',
            'ci.numeric' => 'La cédula debe ser un valor numérico.',
            

        ];

       $validator = Validator::make($request->all(), $rules, $messages)->validate();
       


       try {


            $registro = new Registro();
            $registro->id_remitente = $request->get('id_personal');
            $registro->nro_correspondencia = ($request->get('nro_correspondencia'));
            $registro->asunto = ($request->get('asunto'));
            $registro->fecha = $request->get('fecha');
            $registro->id_tipo_correspondencia = $request->get('id_tipo_correspondencia');
            $registro->id_area_trabajo = $request->get('id_area_trabajo');
            $registro->id_ente = $request->get('id_ente');
            $registro->id_nomenclatura = $request->get('id_nomenclatura');
                       
            $registro->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en seguimiento.store: " . $th. today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
 

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $registro = Registro::find($id);
        return response()->json(view('seguimiento.show', compact('registro'))->render());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $registro = Registro::find($id);
        $estatus = Estatus::pluck('descripcion', 'id_estatus');
        $tipo_correspondencia = Tipo_correspondencia::pluck('descripcion', 'id_tipo_correspondencia');
        $area_trabajo = Area_trabajo::pluck('descripcion', 'id_area_trabajo');
        $personal = Personal::where('id_personal',$registro->id_remitente)->get();//pluck('ci','nombre','apellido', 'id_personal'); 
        $ente = Ente::pluck('descripcion', 'id_ente');
        $nomenclatura = Nomenclatura::pluck('descripcion', 'id_nomenclatura');
        return response()->json(view('seguimiento.edit', compact('estatus','personal','registro', 'tipo_correspondencia','area_trabajo','ente','nomenclatura'))->render());
    }   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
       
        $rules = [

            'ci' => 'required',
           
          
        ];

        $messages = [

            'ci.required' => 'La cédula es obligatoria.',
            
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();
     
        try {





            $registro = Registro::find($id);

/*          $registro->id_remitente = $request->get('id_personal');
            $registro->nro_correspondencia = Str::upper($request->get('nro_correspondencia'));
            $registro->  = Str::upper($request->get('fecha'));
            $registro->asunto = $request->get('asunto');
            $registro->id_tipo_correspondencia = $request->get('id_tipo_correspondencia');
            $registro->id_area_trabajo = $request->get('id_area_trabajo');
            $registro->id_ente = $request->get('id_ente'); */
            $registro->id_nomenclatura = $request->get('nomenclatura');
            $registro->correlativo = $request->get('correlativo');
            $registro->anno = $request->get('anno');
            $registro->observacion = $request->get('observacion');
            $registro->id_asignado = $request->get('id_personal');

            $correlativo=$this->getCorrelativo($request->get('nomenclatura'));
            $registro->correlativo=$correlativo;
            $registro->save();

            return response()->json(['mensaje' => 'success', 'correlativo'=>$correlativo], 200);
        } catch (\Throwable $th) {
            Log::error("Error en seguimiento.edit: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }


    public function getCorrelativo($id_nomenclatura){
        try {
           // $maxCorrelativo = DB::table('view_correlativo')->select('max')->get();
           $maxCorrelativo = DB::table('registro')->where('id_nomenclatura',$id_nomenclatura)->max('correlativo');
            $newCorrelativo=$maxCorrelativo+1;

            while(count(Registro::where('correlativo',$newCorrelativo)->where('id_nomenclatura',$id_nomenclatura)->get()) > 0){

                $maxCorrelativo=DB::table('view_correlativo')->select('max')->get();
                $newCorrelativo=$maxCorrelativo+1;

            }

            return  $newCorrelativo;
           

        } catch (\Throwable $th) {
            Log::error('Error algenerar correlativo '. $th);
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $registro = Registro::find($id);

            if ($registro->id_estatus == 1) {
                $registro->id_estatus = 2;
            } else {
                $registro->id_estatus = 1;
            }

            $registro->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en seguimiento.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }

    public function getPerson(Request $request){ 
        //dd($request->all());
        $personal = Personal::where('ci', $request->ci)->first();

        return response()->json($personal);
        
    }

       public function imprimir($id){

        $registro = Registro::select('personal.id_personal',
                                   'personal.nombre', 
                                   'personal.apellido', 
                                   'registro.nro_correspondencia', 
                                   'registro.fecha',
                                   'registro.asunto',
                                   'ente.descripcion as ente',
                                   'nomenclatura.descripcion as nomenclatura'
                                )
        ->leftjoin('personal', 'personal.id_personal','registro.id_remitente' )
        ->leftjoin('ente', 'ente.id_ente', 'registro.id_ente')
        ->leftjoin('nomenclatura', 'nomenclatura.id_nomenclatura', 'registro.id_nomenclatura')
        ->findOrFail($id);
        //dd($registro);

        return view('registro.preview-print', compact('registro'));
    }

 

    /**
     * Ver form para anexar documentos.
     * @return \Illuminate\Http\Response
     */
    
    public function win_anexar_documento($id, Request $request)
    {
    
        $registro = Registro::find($id);
        return response()->json(view('seguimiento.anexar_documento', compact('registro'))->render());
    }  



    public function anexar_documento(Request $request, $id){

    
        $registro = Registro::findOrFail($id);
        $documento = Documento::create([
            //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
            'id_registro'     => $registro->id_registro,
//            'ruta_documento'     => $request -> file('archivo')/* -> store('') */,
            'ruta_documento'     => $request ->archivo/* -> store('') */,

        ]);

        return redirect()->back()->with('adjunto','Archivo adjunto con éxito.');
        //return response()->json($registro);

   /* try 
    {
        Log::error('Anexando.....');
        $registro = Registro::findOrFail($id);
        $documento = Documento::create([
            //Ojo aqui es en donde asignas la ruta del file a donde ira el documento en este caso es en la carpeta public/ pero puedes definir la carpeta que quieras
            'registro_id'     => $registro->id_registro,
            'ruta_documento'     => $request -> file('archivo')-> store(''),
            ]);

        return response()->json(['mensaje' => 'success'], 200);
    } catch (\Throwable $th) {
        
        Log::error("Error en seguimiento.destroy: " . $th . today());
        return response()->json(['mensaje' => 'Error interno'], 500);
    }*/

    
    }
}