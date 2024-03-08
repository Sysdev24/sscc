<div>
    {!!Form::open(['url'=>'/permissions','method'=>'post','id'=>'agregar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('descripcion', 'Descripcion:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'descripcion',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa la descripcion del permiso']) !!}
        </div>
        <div class="col-12">
            {!! Form::label('name', 'Permiso:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'name',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el nombre del permiso']) !!}
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
