<div>
    {!!Form::open(['url'=>'/role_has_permissions','method'=>'put','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id',$role_has_permissions->id_roles_has_permissions) !!}
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('roles', 'ROLES:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'roles',
            $roles,
            $role_has_permissions->id_roles,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione el rol']) !!}
        </div>
        <div class="col-12">
            {!! Form::label('permission', 'PERMISOS:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'permission',
            $permission,
            $role_has_permissions->id_permissions,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione el permiso']) !!}
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>

    <div id="foot-notificacion">

    </div>
    {!! Form::close() !!}
</div>