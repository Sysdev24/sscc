<?php

namespace App\Http\Controllers\Registro;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Personal;
use App\Models\Administracion\Estatus;
use App\Models\Administracion\Tipo_correspondencia;
use App\Models\Administracion\Area_trabajo;
use App\Models\Administracion\Ente;
use App\Models\Administracion\Nomenclatura;
use App\Models\Registro\Registro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class RegistroController extends Controller
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
            return response()->json(view('registro.listado')->render());
        }
        $personal = Personal::pluck('ci','nombre','apellido', 'id_personal');
        $tipo_correspondencia = Tipo_correspondencia::pluck('descripcion','id_tipo_correspondencia');
        $area_trabajo = Area_trabajo::pluck('descripcion','id_area_trabajo');
        $ente = Ente::pluck('descripcion','id_ente');
        $nomenclatura = Nomenclatura::pluck('descripcion','id_nomenclatura');

        return view('registro.index', compact('personal','tipo_correspondencia','area_trabajo','ente','nomenclatura'));
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

            //'ci' => 'required|numeric',
            /* 'nro_tlf' => 'required|numeric|max:12|unique:registro',
            'cuenta_uso' => 'required|numeric', */
          
        ];

        $messages = [

            'ci.required' => 'La cédula es obligatoria.',
            'ci.numeric' => 'La cédula debe ser un valor numérico.',
            /* 'nro_tlf.required' => 'El numero de telefono es obligatorio',
            'nro_tlf.numeric' => 'El numero de telefono debe ser un valor numérico',
            'nro_tlf.unique' => 'El nro de telefono ya está registrado.',
            'nro_tlf.max' => 'El numero de tlf superó el máximo de caracteres permitidos.',
            'cuenta_uso.required' => 'La cuenta uso es obligatorio',
            'cuenta_numeric' => 'La cuenta uso debe ser un valor numérico', */

        ];

       $validator = Validator::make($request->all(), $rules, $messages)->validate();
       


       try {

            $registro = new Registro();
            $registro->id_remitente = $request->get('id_personal');
            $registro->nro_correspondencia = $request->get('nro_correspondencia');
            $registro->asunto = $request->get('asunto');
            $registro->fecha = $request->get('fecha');
            $registro->id_tipo_correspondencia = $request->get('id_tipo_correspondencia');
            $registro->id_area_trabajo = $request->get('id_area_trabajo');
            $registro->id_ente = $request->get('id_ente');
                    
            $registro->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en registro.store: " . $th. today());
            //dd('Error pendejo');
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
        return response()->json(view('registro.show', compact('registro'))->render());
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
       // dd($registro);
        return response()->json(view('registro.edit', compact('estatus','personal','registro', 'tipo_correspondencia','area_trabajo','ente','nomenclatura' ))->render());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Estado  $estado
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

            $registro->id_remitente = $request->get('id_personal');
            $registro->nro_correspondencia = Str::upper($request->get('nro_correspondencia'));
            $registro->fecha = $request->get('fecha');
            $registro->asunto = $request->get('asunto');
            $registro->id_tipo_correspondencia = $request->get('tipo_correspondencia');
            $registro->id_area_trabajo = Str::upper($request->get('area_trabajo'));
            $registro->id_ente = Str::upper($request->get('ente'));
          
            $registro->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en registro.edit: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
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
            Log::error("Error en registro.destroy: " . $th . today());
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
                                   'ente.descripcion as ente'
                                )
        ->leftjoin('personal', 'personal.id_personal','registro.id_remitente' )
        ->leftjoin('ente', 'ente.id_ente', 'registro.id_ente')
        ->findOrFail($id);
        //dd($registro);

        return view('registro.preview-print', compact('registro'));
    }

  
}
