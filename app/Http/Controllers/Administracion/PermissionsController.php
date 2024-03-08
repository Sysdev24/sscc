<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class PermissionsController extends Controller
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
			return response()->json(view('administracion.permissions.listado')->render());
        }

        return view('administracion.permissions.index');
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
            'name' => 'required|unique:permissions,name|max:25|min:5',
            'descripcion' => 'required|max:250|min:5|unique:permissions,descripcion',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrada.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
            'descripcion.min' => 'El nombre tiene que tener un minimo de caracteres permitidos.',
            'name.required' => 'El nombre del permiso es obligatorio.',
            'name.unique' => 'El Permiso ya está registrado.',
            'name.max' => 'El Permiso superó el máximo de caracteres permitidos.',
            'name.min' => 'El Permiso tiene que tener un minimo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {

            $permissions = new Permission();
            $permissions->descripcion = Str::upper($request->get('descripcion'));
            $permissions->name = Str::upper($request->get('name'));
            $permissions->save();
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en ente.store: " . $th);
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
        $permissions = Permission::find($id);
        return response()->json(view('administracion.permissions.show', compact('permissions'))->render());
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $permissions = Permission::find($id);
        return response()->json(view('administracion.permissions.edit', compact('permissions'))->render());
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
            'name' => 'required|unique:permissions,name|max:25|min:5',
            'descripcion' => 'required|max:250|min:5|unique:permissions,descripcion',
        ];

        $messages = [
            'descripcion.required' => 'El nombre de la gerencia es obligatorio.',
            'descripcion.unique' => 'La gerencia ya está registrada.',
            'descripcion.max' => 'El nombre superó el máximo de caracteres permitidos.',
            'descripcion.min' => 'El nombre tiene que tener un minimo de caracteres permitidos.',
            'name.required' => 'El nombre del permiso es obligatorio.',
            'name.unique' => 'El Permiso ya está registrado.',
            'name.max' => 'El Permiso superó el máximo de caracteres permitidos.',
            'name.min' => 'El Permiso tiene que tener un minimo de caracteres permitidos.',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {
            $permissions = Permission::find($id);
            $permissions->descripcion = Str::upper($request->get('descripcion'));
            $permissions->name = Str::upper($request->get('name'));
            $permissions->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en permiso.store: " . $th . today());
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
            $permissions = Permission::find($id);

            if ($permissions->id_estatus = 1) {
                $permissions->id_estatus = 2;
            } else {
                $permissions->id_estatus = 1;
            }

            $permissions->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en permiso.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
}
