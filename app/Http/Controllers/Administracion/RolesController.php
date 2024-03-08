<?php

namespace App\Http\Controllers\Administracion;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;

class RolesController extends Controller
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
        $permisos = Permission::all();

        if ($request->ajax()) {
            return response()->json(view('administracion.roles.listado', compact('permisos'))->render());
        }

        return view('administracion.roles.index',compact('permisos'));
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
            'name' => 'required|unique:roles,name|max:25|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'permission' =>'required_without_all',
        ];

        $messages = [
            'name.required' => 'El roles es obligatorio.',
            'name.max' => 'El roles el máximo de caracteres permitidos.',
            'name.unique' => 'El roles ya esta registrado.',
			'name.alpha' => 'El rol debe contener solo letras.',
            'permission.required_without_all' => 'Debe seleccionar algunos de los permisos',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {

            $roles = new Role();
            $roles->name = Str::upper($request->get('name'));
            //dd($roles);
            $roles->save();
            $roles->permissions()->sync($request->permission);
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en roles.store: " . $th);
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
        $roles = Role::find($id);
        return response()->json(view('administracion.roles.show', compact('roles'))->render());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::find($id);
        $permisos = Permission::all();
        $permission_role=$roles->permissions();
        return response()->json(view('administracion.roles.edit', compact('roles'))->render());
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
            //'name' => 'required|unique:roles,name,' . $id . ',id|max:100|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)',
            'name' => 'required|unique:roles,name,|max:100|regex:([a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+)|exists:roles,name',
            //'permission' =>'required_without_all',
        ];

        $messages = [
            'name.required' => 'El roles es obligatorio.',
            'name.max' => 'El tipo de roles el máximo de caracteres permitidos.',
            'name.unique' => 'El roles ya esta registrado.',
			'name.alpha' => 'El rol debe contener solo letras.',
            //'permission.required_without_all' => 'Debe seleccionar algunos de los permisos',
        ];

        $validator = Validator::make($request->all(), $rules, $messages)->validate();

        try {
            $roles = Role::find($id);
            $roles->name = Str::upper($request->get('name'));
            $roles->save();
            //$roles->permissions()->sync($request->permission);
            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en roles.edit: " . $th . today());
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
            $roles = Role::find($id);

            if ($roles->id_estatus == 1) {
                $roles->id_estatus = 2;
            } else {
                $roles->id_estatus = 1;
            }

            $roles->save();

            return response()->json(['mensaje' => 'success'], 200);
        } catch (\Throwable $th) {
            Log::error("Error en roles.destroy: " . $th . today());
            return response()->json(['mensaje' => 'Error interno'], 500);
        }
    }
}
