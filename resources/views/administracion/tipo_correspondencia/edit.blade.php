<div>
    {!!Form::open(['url'=>'/tipo_correspondencia','method'=>'put','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id',$tipo_correspondencia->id_tipo_correspondencia) !!}
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('descripcion', 'CORRESPONDENCIA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'descripcion',
            $tipo_correspondencia->descripcion,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el nombre de la correspondencia']) !!}
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>

    <div id="foot-notificacion">

    </div>
    {!! Form::close() !!}
</div>