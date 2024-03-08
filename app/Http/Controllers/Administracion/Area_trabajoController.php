<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Area_trabajo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class Area_trabajoController extends Controller
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
			return response()->json(view('administracion.area_trabajo.listado')->render());
        }

        return view('administracion.area_trabajo.index');
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
            'descripcion' => 'required|unique:area_trabajo|max:25|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrada.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
			'descripcion.alpha' => 'La gerencia debe contener solo letras.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {

            $area_trabajo = new Area_trabajo();
            $area_trabajo->descripcion = Str::upper($request->get('descripcion'));
            $area_trabajo->save();
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en area_trabajo.store: " . $th);
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
        $area_trabajo = Area_trabajo::find($id);
        return response()->json(view('administracion.area_trabajo.show', compact('area_trabajo'))->render());
    }
	
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $area_trabajo = Area_trabajo::find($id);
        return response()->json(view('administracion.area_trabajo.edit', compact('area_trabajo'))->render());
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
            'descripcion' => 'required|unique:area_trabajo,descripcion,' . $id . ',id_area_trabajo|max:25|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrado.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
			'descripcion.alpha' => 'La gerencia debe contener solo letras.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {
            $area_trabajo = Area_trabajo::find($id);
            $area_trabajo->descripcion = Str::upper($request->get('descripcion'));
            $area_trabajo->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en area_trabajo.store: " . $th . today());
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
            $area_trabajo = Area_trabajo::find($id);

            if ($area_trabajo->id_estatus = 1) {
                $area_trabajo->id_estatus = 2;
            } else {
                $area_trabajo->id_estatus = 1;
            }

            $area_trabajo->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en area_trabajo.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
}
