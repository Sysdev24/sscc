<div>
    {!!Form::open(['url'=>'/usuarios','method'=>'post','id'=>'agregar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('ci', 'CÉDULA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'ci',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa la cédula del usuario']) !!}
            {{-- <a id="btnBuscarUsuraioLdap" href="{{route('consultar-usuario-ldap')}}" class="btn-primary">
                <span class="icofont-ui-search"></span>
            </a> --}}
        </div>
        <div class="col-6">
            {!! Form::label('usuario', 'USUARIOS:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'usuario',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingresar usuario']) !!}
        </div>
    </div>
    <hr />
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('nombre', 'NOMBRE:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'nombre',
            null,
            ['class'=>'form-control']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('apellido', 'APELLIDO:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'apellido',
            null,
            ['class'=>'form-control']) !!}
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('email', 'CORREO ELÉCTRONICO:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'email',
            null,
            ['class'=>'form-control']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('password', 'CONTRASEÑA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'password',
            null,
            ['class'=>'form-control']) !!}
        </div>
    </div>
    <hr />

    {{-- <div class="row mb-4">
        <div class="col-4">
            {!! Form::label('estatus', 'ESTATUS:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'estatus',
            null,
            ['class'=>'form-control']) !!}
        </div>
    </div> --}}
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('gerencia', 'GERENCIA:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select("gerencia", $gerencia, null, ['class'=>'chosen-select
            form-control','data-placeholder'=>'Seleccione la gerencia'])
            !!}
        </div>
        <div class="col-6">
            {!! Form::label('roles', 'ROLES:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            
            {!! Form::select("roles", $roles, null, ['class'=>'chosen-select
            form-control','data-placeholder'=>'Seleccione el rol'])
            !!}
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
