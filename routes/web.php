<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
 */

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/registro');
    } else {
        return view('auth/login');
    }
})->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\Registro\RegistroController::class, 'index'])->name('home')->middleware('auth');
Route::get('/consultar-usuario-ldap', [App\Http\Controllers\Controllers_Generic\LDAPController::class, 'consultarUsuarioLDAP'])->name('consultar-usuario-ldap');
Route::get('/consultar-datos-usuario-ldap', [App\Http\Controllers\Controllers_Generic\LDAPController::class, 'consultarDatosUsuarioLDAP'])->name('consultar-datos-usuario-ldap');

//FIXME: Eliminar esta ruta
Route::get('/consultar-datos-usuario-ldap-cedula/{cedula}', [App\Http\Controllers\Controllers_Generic\LDAPController::class, 'consultarDatosUsuarioLDAPXCedula'])->name('consultar-datos-usuario-ldap-cedula');

Route::get('/consultar', [App\Http\Controllers\Visitantes\VisitanteController::class, 'consultarVisitante'])->name('consultar-visitante');

Route::get('/reportes', [\App\Http\Controllers\Reportes\ReporteRegistroController::class, 'index'])->name('reportes');

Route::get('/consultar-registro', [\App\Http\Controllers\Reportes\ReporteRegistroController::class, 'getViewRegistersByFilters'])->name('consultar-registro');
Route::get('/export-excel', [\App\Http\Controllers\Reportes\ReporteRegistroController::class, 'exportToExcelOrOpenOffice'])->name('export-excel');
Route::get('/export-pdf', [\App\Http\Controllers\Reportes\ReporteRegistroController::class, 'exportToPDF'])->name('export-pdf');
Route::get('registro_pdf', [\App\Http\Controllers\Reportes\ReporteRegistroController::class, 'registro_pdf'])->name('registro_pdf');


Route::resource('/usuarios', App\Http\Controllers\Administracion\UserController::class)->except('create');
Route::resource('/tipo_correspondencia', App\Http\Controllers\Administracion\Tipo_correspondenciaController::class)->except('create');
Route::resource('/gerencia', App\Http\Controllers\Administracion\GerenciaController::class)->except('create');
Route::resource('/area_trabajo', App\Http\Controllers\Administracion\Area_trabajoController::class)->except('create');
Route::resource('/personal', App\Http\Controllers\Administracion\PersonalController::class)->except('create');
Route::resource('/estatus', App\Http\Controllers\Administracion\EstatusController::class)->except('create');
Route::resource('/usuarios', App\Http\Controllers\Administracion\UserController::class)->except('create');
Route::resource('/ente', App\Http\Controllers\Administracion\EnteController::class)->except('create');
Route::resource('/role_has_permissions', App\Http\Controllers\Administracion\Role_has_permissionsController::class)->except('create');
//Route::resource('/permissions', App\Http\Controllers\Administracion\PermissionsController::class)->except('create');
Route::resource('/nomenclatura', App\Http\Controllers\Administracion\NomenclaturaController::class)->except('create');
Route::resource('/cargo', App\Http\Controllers\Administracion\CargoController::class)->except('create');
// Route::resource('/equipo', App\Http\Controllers\Administracion\EquipoController::class)->except('create');
// Route::resource('/equipo_componente', App\Http\Controllers\Administracion\Equipo_componenteController::class)->except('create');
//Route::resource('/roles', App\Http\Controllers\Administracion\RolesController::class)->except('create');
Route::resource('/firmante', App\Http\Controllers\Administracion\FirmanteController::class)->except('create');

Route::resource('/registro', App\Http\Controllers\Registro\RegistroController::class)->except(['create']);
Route::resource('/seguimiento', App\Http\Controllers\Seguimiento\SeguimientoController::class)->except(['create']);
Route::resource('/visitantes', App\Http\Controllers\Visitantes\VisitanteController::class)->except(['destroy','create']);
Route::get('/getPerson', 'App\Http\Controllers\Registro\RegistroController@getPerson')->name('get.person');

//Route::get('/getPerson_asignado', 'App\Http\Controllers\RegistroSeguimiento\SeguimientoController@getPerson_asignado')->name('get.person_asignado');
Route::get('/getPerson_asignado', 'App\Http\Controllers\Seguimiento\SeguimientoController@getPerson_asignado')->name('get.person_asignado');




Route::put('/seguimiento/anexar_documento/{id}','App\Http\Controllers\Seguimiento\SeguimientoController@anexar_documento')->name('seguimiento.anexar_documento');
Route::get('seguimiento/{id}/anexar_documento','App\Http\Controllers\Seguimiento\SeguimientoController@win_anexar_documento')->name('anexar_documento');






Route::get('/getSerial', 'App\Http\Controllers\Registro\RegistroController@getSerial')->name('get.serial');

Route::get('/registro/preview-print/{id}',[App\Http\Controllers\Registro\RegistroController::class, 'imprimir'])->name('imprimir-acta');
//Route::post('/seguimiento/{id}/anexar_documento', [App\Http\Controllers\Seguimiento\SeguimientoController::class, 'anexar_documento'])->name(['anexar_documento']);



///****      ROLES Y PERMISOS    ***/

//Roles de usuarios
Route::get('/roles', [App\Http\Controllers\Administracion\RolesController::class, 'index'])->name('roles.index');
Route::get('/roles/create', [App\Http\Controllers\Administracion\RolesController::class, 'create'])->name('roles.create');
Route::post('/roles', [App\Http\Controllers\Administracion\RolesController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}', [App\Http\Controllers\Administracion\RolesController::class, 'show'])->name('roles.show');
Route::get('/roles/{id}/edit', [App\Http\Controllers\Administracion\RolesController::class, 'edit'])->name('roles.edit');
Route::patch('/roles/{id}', [App\Http\Controllers\Administracion\RolesController::class, 'update'])->name('roles.update');
Route::delete('/roles/{id}', [App\Http\Controllers\Administracion\RolesController::class, 'destroy'])->name('roles.destroy');

                                        //Permisos de roles
Route::get('/permissions', [App\Http\Controllers\Administracion\PermissionsController::class, 'index'])->name('permisos.index');
Route::get('/permissions/create', [App\Http\Controllers\Administracion\PermissionsController::class, 'create'])->name('permisos.create');
Route::post('/permissions', [App\Http\Controllers\Administracion\PermissionsController::class, 'store'])->name('permisos.store');
Route::get('/permissions/{id}', [App\Http\Controllers\Administracion\PermissionsController::class, 'show'])->name('permisos.show');
Route::get('/permissions/{id}/edit', [App\Http\Controllers\Administracion\PermissionsController::class, 'edit'])->name('permisos.edit');
Route::patch('/permissions/{id}', [App\Http\Controllers\Administracion\PermissionsController::class, 'update'])->name('permisos.update');
Route::delete('/permissions/{id}', [App\Http\Controllers\Administracion\PermissionsController::class, 'destroy'])->name('permisos.destroy');
