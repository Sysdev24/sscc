<?php


use App\Models\Registro\Registro;
use App\Models\Administracion\Gerencia;
use App\Models\Administracion\Firmante;
use App\Models\Administracion\Area_trabajo;
use App\Models\Administracion\Ente;
use App\Models\Administracion\Role_has_permissions;
use App\Models\Administracion\Permissions;
use App\Models\Administracion\Nomenclatura;
use App\Models\Administracion\Estatus;
Use App\Models\User;
use App\Models\Administracion\Tipo_correspondencia;
use App\Models\ViewRegistro;
use App\Models\Administracion\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Administracion\Cargo;
use App\Models\Administracion\Roles;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */
 Route::get('registro', function () {
$data =DB::table('registro as r');
    
    $data = $data->select(['r.id_registro',
    'r.id_estatus as estatus_registro',
                                   'p.id_personal as id_remitente',
                                   'p.ci', 
                                   'p.nombre', 
                                   'p.apellido', 
                                   'p.nro_empleado',
                                   'c.descripcion as cargo', 
                                   'g.descripcion as gerencia',
                                   'e.descripcion as estatus', 
                                   'n.descripcion as nomenclatura',
                                   'r.correlativo',
                                   'r.anno',                                    
                                   'r.fecha',
                                   'r.asunto',
                                   'r.nro_correspondencia',
                                   't.descripcion as correspondencia',
                                   'a.descripcion as tipo_correspondencia',
                                   'r.observacion',
                                   'ee.descripcion as ente',
                                   'pp.id_personal as id_asignado',
                                   'pp.ci as ci_asignado', 
                                   'pp.nombre as nombre_asignado', 
                                   'pp.apellido as apellido_asignado'                                
                                ]);
    $data = $data->leftjoin('personal as p', 'p.id_personal','r.id_remitente');
    $data = $data->leftjoin('estatus as e', 'e.id_estatus', 'r.id_estatus');
    $data = $data->leftjoin('gerencia as g', 'g.id_gerencia', 'p.id_gerencia');
    $data = $data->leftjoin('cargo as c', 'c.id_cargo', 'p.id_cargo');
    $data = $data->leftjoin('tipo_correspondencia as t', 't.id_tipo_correspondencia', 'r.id_tipo_correspondencia');
	$data = $data->leftjoin('area_trabajo as a', 'a.id_area_trabajo', 'r.id_area_trabajo');
    $data = $data->leftjoin('ente as ee', 'ee.id_ente', 'r.id_ente');
    $data = $data->leftjoin('nomenclatura as n', 'n.id_nomenclatura', 'r.id_nomenclatura');
    $data = $data->leftjoin('personal as pp', 'pp.id_personal','r.id_asignado' );
    $data = $data->get();
    return compact('data');
});
 
Route::get('gerencia', function (Request $request) {
    $data = Gerencia::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('area_trabajo', function (Request $request) {
    $data = Area_trabajo::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('ente', function (Request $request) {
    $data = Ente::where ('id_estatus','1')->get ();
    return compact('data');
});
Route::get('role_has_permissions', function () {
    $data =DB::table('role_has_permissions');
        
        $data = $data->select([
                                       'permissions.descripcion as descripcion',
                                       'permissions.nombre as nombre', 
                                       'roles.descripcion',                                 
                                    ]);
        $data = $data->leftjoin('permissions', 'role_has_permissions.id_permissions','permissions.id_permissions' );
        $data = $data->leftjoin('roles', 'role_has_permissions.id_roles', 'roles.id_roles');
        $data = $data->get();
        return compact('data');
});

Route::get('permissions', function (Request $request) {
    $data = Permissions::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('nomenclatura', function (Request $request) {
    $data = Nomenclatura::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('tipo_correspondencia', function (Request $request) {
    $data = Tipo_correspondencia::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('estatus', function (Request $request) {
    $data = Estatus::all();
    return compact('data');
});

Route::get('personal', function () {
    //dd('estoy aqui');
    $data = Personal::where ('id_estatus', '1')
    ->with(['cargo', 'gerencia','Estatus'])
    ->get();
    //dd($data[0]->cargo->descripcion);
    return  compact('data');
    return response()->json($data);
});

Route::get('cargo', function () {
    $data = Cargo::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('roles', function () {
    $data = Roles::where ('id_estatus','1')->get ();
    return compact('data');
});

Route::get('firmante', function () {
    $data = Firmante::where ('id_estatus','1')
    ->with(['personal','Estatus'])
    ->get();
    return compact('data');
    return response()->json($data);
});

Route::get('usuarios', function () {
    $data = User::orderBy('usuario')->where('usuario', '<>', 'ADMIN')
    ->with(['gerencia','roles','Estatus'])
    ->get();
    return compact('data');
});


Route::get('usuario', function () {
    //dd('estoy aqui');
    $data = Personal::where ('id_estatus', '1')
    ->with(['gerencia','estatus'])
    ->get();
    //dd($data);
    return  compact('data');
    return response()->json($data); 
});
