<div>
    {!!Form::open(['url'=>'/roles','method'=>'post','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    @csrf @method('PATCH')
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('name', 'ROLES', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'name',
            $roles->name,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el rol']) !!}
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>

    <div id="foot-notificacion">

    </div>
    {!! Form::close() !!}
</div>
