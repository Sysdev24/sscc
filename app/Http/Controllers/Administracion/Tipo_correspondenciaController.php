<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Tipo_correspondencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Tipo_correspondenciaController extends Controller
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
			return response()->json(view('administracion.tipo_correspondencia.listado')->render());
        }

        return view('administracion.tipo_correspondencia.index');
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
            'descripcion' => 'required|unique:tipo_correspondencia|max:25',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la correspondencia es obligatorio.',
            'descripcion.unique' => 'La correspondencia ya está registrada.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {

            $tipo_correspondencia = new Tipo_correspondencia();
            $tipo_correspondencia->descripcion = Str::upper($request->get('descripcion'));
            $tipo_correspondencia->save();
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en tipo_correspondencia.store: " . $th);
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipo_correspondencia = Tipo_correspondencia::find($id);
        return response()->json(view('administracion.tipo_correspondencia.show', compact('tipo_correspondencia'))->render());
    }
	
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $tipo_correspondencia = Tipo_correspondencia::find($id);
        return response()->json(view('administracion.tipo_correspondencia.edit', compact('tipo_correspondencia'))->render());
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

        $rules = [
            'descripcion' => 'required|unique:tipo_correspondencia,descripcion,' . $id . ',id_tipo_correspondencia|max:25',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la correspondencia es obligatorio.',
            'descripcion.unique' => 'La correspondencia ya está registrado.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {
            $tipo_correspondencia = Tipo_correspondencia::find($id);
            $tipo_correspondencia->descripcion = Str::upper($request->get('descripcion'));
            $tipo_correspondencia->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en tipo_correspondencia.store: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipo_correspondencia = Tipo_correspondencia::find($id);

            if ($tipo_correspondencia->id_estatus = 1) {
                $tipo_correspondencia->id_estatus = 2;
            } else {
                $tipo_correspondencia->id_estatus = 1;
            }

            $tipo_correspondencia->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en tipo_correspondencia.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
}
