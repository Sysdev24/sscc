<div>
    {!!Form::open(['url'=>'/registro','method'=>'post','id'=>'agregar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    <div class="row mb-4">
        <div class="col-3">
            {!! Form::label('ci', 'CÉDULA DEL REMITENTE:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'ci',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingrese el numero de cedula', 'id' =>'ci']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('id_personal', 'ID:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'id_personal',
            null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('nombre', 'NOMBRES:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'nombre',
            null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
    
	
	        <div class="col-4">
            {!! Form::label('apellido', 'APELLIDOS', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'apellido',
            null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
    </div>
	
  <hr />

    <div class="row mb-4">
        <div class="col-6">
            {!! Form::label('fecha', 'FECHA:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::date(
            'fecha',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingrese fecha']) !!}
        </div>

        <div class="col-6">
                   
            {!! Form::label('nro_correspondencia', 'NRO CORRESPONDENCIA:', ['class' => 'form-label font-weight-bold']) !!}
            {!! Form::text(
                'nro_correspondencia',
                null,
                ['class'=>'form-control', 
                'placeholder'=>'Ingrese el Numero de correspondencia']) !!}
        
        </div>

        <div class="col-6">
            {!! Form::label('id_tipo_correspondencia', 'TIPO CORRESPONDENCIA:', ['class' => 'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select('id_tipo_correspondencia', $tipo_correspondencia, null, [
                'class' => 'chosen-select form-control',
                'data-placeholder' => 'Seleccione tipo_correpondencia',]) !!}
        
        </div>

        <div class="col-6">
            {!! Form::label('id_area_trabajo', 'CORRESPONDECIA:', ['class' => 'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select('id_area_trabajo', $area_trabajo, null, [
                'class' => 'chosen-select form-control',
                'data-placeholder' => 'Seleccione la correpondencia',]) !!}        
        </div>

        <div class="col-6">
            {!! Form::label('id_ente', 'ENTE:', ['class' => 'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>

            {!! Form::select('id_ente', $ente, null, [
                'class' => 'chosen-select form-control',
                'data-placeholder' => 'Seleccione el ente',]) !!}        
        </div>

        <div class="col-6">
            {!! Form::label('asunto', 'ASUNTO:', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'asunto',
            null,
            ['class'=>'form-control', 
            'placeholder'=>'Ingrese el Asunto']) !!}
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
