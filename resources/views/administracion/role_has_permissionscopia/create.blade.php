<div>
    {!!Form::open(['url'=>'/role_has_permissions','method'=>'post','id'=>'agregar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    <div class="row mb-4">
        <div class="col-6">
                   
            {!! Form::label('id_roles', 'ROLES:', ['class' => 'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select('id_roles', $roles, null, [
                'class' => 'chosen-select form-control',
                'data-placeholder' => 'Seleccione el rol',]) !!}
        
        </div>
        <div class="col-6">
                   
            {!! Form::label('id_permissions', 'PERMISOS:', ['class' => 'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select('id_permissions', $permissions, null, [
                'class' => 'chosen-select form-control',
                'data-placeholder' => 'Seleccione el permiso',]) !!}
        
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
        <input type="button" id="btnLimpiaFormulario" value="LIMPIAR" class="btn btn-primary m-2">
    </div>

    <div id="foot-notificacion">


    </div>
    {!! Form::close() !!}
</div>