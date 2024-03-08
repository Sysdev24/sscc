<div> 
    {!!Form::open(['url'=>'/seguimiento/anexar_documento/'. $registro->id_registro ,'method'=>'put','id'=>'anexar_documento','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    @method('PUT')
  <!--  {!! Form::text('id', $registro->id_registro) !!} --> 

    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('archivo', 'Anexar Documento:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio - Formato PDF - Tamaño maximo 2MB</small>
            {!! Form::file(
            'archivo',
            ['class'=>'form-control']) !!}
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

