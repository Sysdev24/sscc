<div>
    {!!Form::open(['url'=>'/registro','method'=>'put','id'=>'editar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id', $registro->id_registro) !!}
    <div class="row mb-4">
        <div class="col-3">
            {!! Form::label('ci', 'CÉDULA:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'ci',
            $personal[0]->ci,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-2">
            {!! Form::label('id_personal', 'ID:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'id_personal',
            $personal[0]->id_personal,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-3">
            {!! Form::label('nombre', 'NOMBRES:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'nombre',
            $personal[0]->nombre,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-3">
            {!! Form::label('apellido', 'APELLIDOS:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'apellido',
            $personal[0]->apellido,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
    </div>
    
    <hr />
   
    <div class="row mb-4">


        <div class="col-4">
            {!! Form::label('fecha', 'fecha:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::date(
            'fecha',
            date('Y-m-d', strtotime ($registro->fecha)),
            ['class'=>'form-control', 
            'placeholder'=>'Ingrese la Fecha']) !!}
          
        </div>
    
        <div class="col-4">
            {!! Form::label('nro_correspondencia', 'NRO CORREPOSNDENCIA:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'nro_correspondencia',
            $registro->nro_correspondencia,
            ['class'=>'form-control', 
            'placeholder'=>'Ingrese el Nro. Correspondencia']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('tipo_correspondencia', 'TIPO:' , ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'tipo_correspondencia',
            $tipo_correspondencia,
            $registro->id_tipo_correspondencia,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione el tipo de correpondencia'])
            !!}
        </div>

        <div class="col-4">
            {!! Form::label('area_trabajo', 'Tipo Correpondencia:' , ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'area_trabajo',
            $area_trabajo,
            $registro->id_area_trabajo,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione tipo de correpondencia'])
            !!}
        </div>

        <div class="col-4">
            {!! Form::label('ente', 'Ente:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'ente',
            $ente,
            $registro->id_ente,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione el ente']) !!}
        </div>

        <div class="col-6">
            {!! Form::label('asunto', 'Asunto:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'asunto',
            $registro->asunto,
            ['class'=>'form-control', 
            'placeholder'=>'Ingrese el asunto']) !!}
        </div>
    
    </div>

    <div class="row mb-4 justify-content-center">
        {!! Form::submit("GUARDAR", ['class'=>'btn btn-primary m-2']) !!}
    </div>

    <div>
        <input type="button" value="Imprimir" id="print">
    </div>


    <div id="foot-notificacion">


    </div>
    {!! Form::close() !!}
</div>

<script>
    $(".chosen-select").chosen({
    no_results_text: 'No hay resultados.',
});


/**
 * Para activar la impresora se usa el método (window.print())
 * inner('<h1>Acta de entrega<h1>')
*/

$(document).on('click','#print', function(){window.print()})




</script>
