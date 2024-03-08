<div>
    {!!Form::open(['url'=>'/nomenclatura','method'=>'put','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id',$nomenclatura->id_nomenclatura) !!}
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('descripcion', 'NOMENCLATURA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'descripcion',
            $nomenclatura->descripcion,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el nombre de la nomenclatura']) !!}
        </div>
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>

    <div id="foot-notificacion">

    </div>
    {!! Form::close() !!}
</div>