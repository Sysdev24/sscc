<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Nomenclatura;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class NomenclaturaController extends Controller
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
			return response()->json(view('administracion.nomenclatura.listado')->render());
        }

        return view('administracion.nomenclatura.index');
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
            'descripcion' => 'required|unique:nomenclatura|max:25',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrada.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {

            $nomenclatura = new Nomenclatura();
            $nomenclatura->descripcion = Str::upper($request->get('descripcion'));
            $nomenclatura->save();
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en nomenclatura.store: " . $th);
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
        $nomenclatura = Nomenclatura::find($id);
        return response()->json(view('administracion.nomenclatura.show', compact('nomenclatura'))->render());
    }
	
	
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $nomenclatura = Nomenclatura::find($id);
        return response()->json(view('administracion.nomenclatura.edit', compact('nomenclatura'))->render());
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
            'descripcion' => 'required|unique:nomenclatura,descripcion,' . $id . ',id_nomenclatura|max:25',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrado.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {
            $nomenclatura = Nomenclatura::find($id);
            $nomenclatura->descripcion = Str::upper($request->get('descripcion'));
            $nomenclatura->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en nomenclatura.store: " . $th . today());
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
            $nomenclatura = Nomenclatura::find($id);

            if ($nomenclatura->id_estatus = 1) {
                $nomenclatura->id_estatus = 2;
            } else {
                $nomenclatura->id_estatus = 1;
            }

            $nomenclatura->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en nomenclatura.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
}
