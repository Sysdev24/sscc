<div>
    {!!Form::open(['url'=>'/usuarios','method'=>'put','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id', $usuario->id_usuario) !!}
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('ci', 'CÉDULA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'ci',
            $usuario->ci,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa la cedula']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('usuario', 'USUARIOS:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'usuario',
            $usuario->usuario,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el usuario']) !!}
        </div>
    </div>
    <hr />
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('nombre', 'NOMBRE:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'nombre',
            $usuario->nombre,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el nombre']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('apellido', 'APELLIDO:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'apellido',
            $usuario->apellido,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el apellido']) !!}
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('email', 'CORREO ELEÉCTRONICO:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'email',
            $usuario->email,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el correo']) !!}
        </div>
        <div class="col-6">
            {!! Form::label('password', 'CONTRASEÑA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'password',
            $usuario->password,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa la contraseña']) !!}
        </div>
    </div>
    <hr />

    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('gerencia', 'GERENCIA:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            
            {!! Form::select("gerencia", $gerencia, $usuario->id_gerencia, ['class'=>'chosen-select
            form-control','data-placeholder'=>'Seleccione la Gerencia'])
            !!}
        </div>
        <div class="col-6">
            {!! Form::label('roles', 'ROLES:' , ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            
            {!! Form::select("roles", $roles, $usuario->id_roles, ['class'=>'chosen-select
            form-control','data-placeholder'=>'Seleccione el rol'])
            !!}
        </div>
    </div>
    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>


    <div id="foot-notificacion">


    </div>
    {!! Form::close() !!}
</div>
<script>
    $(".chosen-select").chosen({
    no_results_text: 'No hay resultados.',
});
</script>
