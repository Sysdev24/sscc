<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use App\Models\Administracion\Role_has_permissions;
use App\Models\Administracion\Roles;
use App\Models\Administracion\Estatus;
use App\Models\Administracion\Permissions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;



class Role_has_permissionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *create
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->ajax()) {
            return response()->json(view('administracion.role_has_permissions.listado')->render());
        }
        $roles = Roles::pluck('descripcion','id_roles');
        $permissions = Permissions::pluck('nombre','descripcion','id_permissions');

        return view('administracion.role_has_permissions.index', compact('roles','permissions'));
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

            $role_has_permissions = new Role_has_permissions();
            $role_has_permissions->id_roles = $request->get('id_roles');
            $role_has_permissions->id_permissions = $request->get('id_permissions');
            //dd($registro);
            $role_has_permissions->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en rolespermisos.store: " . $th. today());
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
        $role_has_permissions = Role_has_permissions::find($id);
        return response()->json(view('administracion.role_has_permissions.show', compact('role_has_permissions'))->render());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Estado  $estado
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        $role_has_permissions = Role_has_permissions::find($id);
        $estatus = Estatus::pluck('descripcion', 'id_estatus');
        $Permissions = Permissions::pluck('descripcion', 'id_Permissions');
        $roles = Roles::pluck('descripcion', 'id_roles');
        return response()->json(view('administracion.Role_has_permissions.edit', compact('roles','role_has_permissions','Permissions','estatus' ))->render());
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
            'cuenta_uso' => 'required|numeric',
          
        ];

        $messages = [

            'ci.required' => 'La cédula es obligatoria.',
            'cuenta_numeric' => 'La cuenta uso debe ser un valor numérico',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();
     
        try {

            $role_has_permissions = Role_has_permissions::find($id);

            $role_has_permissions->id_roles = $request->get('id_roles');
            $role_has_permissions->id_permissions = $request->get('id_permissions');
            $role_has_permissions->save();

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
            $role_has_permissions = Role_has_permissions::find($id);

            if ($role_has_permissions->id_estatus == 1) {
                $role_has_permissions->id_estatus = 2;
            } else {
                $role_has_permissions->id_estatus = 1;
            }

            $role_has_permissions->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en los rolespermisos.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }

  
}
