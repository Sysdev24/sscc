<div>
    {!!Form::open(['url'=>'/seguimiento','method'=>'put','id'=>'editar_seguimiento','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit'])!!}
    {!! Form::hidden('id', $registro->id_registro) !!}
    <div class="row mb-4">
        
    <div class="col-3">
            {!! Form::label('ci', 'CÉDULA DEL REMITENTE:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'ci',
            $personal[0]->ci,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-3">
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
            {!! Form::label('fecha', 'FECHA:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'fecha',
            date('d-m-yy', strtotime ($registro->fecha)),
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('nro_correspondencia', 'NRO. CORRESPONDENCIA:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'nro_correspondencia',
            $registro->nro_correspondencia,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('tipo_correspondencia', 'TIPO:' , ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::Select(
            'tipo_correspondencia',
            $tipo_correspondencia,
            $registro->id_tipo_correspondencia,
            ['class'=>'form-control chosen-select','disabled'=>'disabled'])
            !!}
        </div>

        <div class="col-4">
            {!! Form::label('area_trabajo', 'TIPO CORRESPONDENCIA:' , ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'area_trabajo',
            $area_trabajo,
            $registro->id_area_trabajo,
            ['class'=>'form-control chosen-select','disabled'=>'disabled'])
            !!}
        </div>

        <div class="col-4">
            {!! Form::label('ente', 'Ente:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'ente',
            $ente,
            $registro->id_ente,
            ['class'=>'form-control chosen-select','disabled'=>'disabled']) !!}
        </div>
   
        <div class="col-12">
            {!! Form::label('asunto', 'ASUNTO:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'asunto',
            $registro->asunto,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>

        <div class="col-4">
            {!! Form::label('nomenclatura', 'NOMENCLATURA:' , ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::select(
            'nomenclatura',
            $nomenclatura,
            $registro->id_nomenclatura,
            ['class'=>'form-control chosen-select',
            'data-placeholder'=>'Seleccione la nomenclatura'])
            !!}
        </div>
    
    
        <div class="col-2">
            {!! Form::label('anno', 'Año:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
                'anno',
                date('Y', strtotime ($registro->fecha)),
                // $registro->anno,
                ['class'=>'form-control', 
            'placeholder'=>'Ingrese el año','readonly'=>'readonly']) !!}
        </div> 

        <div class="col-12">
            {!! Form::label('observacion', 'OBSERVACION:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'observacion',
            $registro->observacion,
            ['class'=>'form-control', 
            'placeholder'=>'Ingrese la observacion']) !!}
        </div>
    
    </div>

    <div class="row mb-4">
        <div class="col-3">
            {!! Form::label('ci_asignado', 'CÉDULA DEL ASIGNADO:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'ci_asignado',
           null,
            ['class'=>'form-control', 'data-placeholder'=>'ingrese la cedula del asignado']) !!}
        </div>
        <div class="col-3">
            {!! Form::label('id_personal_asignado', 'ID:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'id_personal_asignado',
            null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-3">
            {!! Form::label('nombre_asignado', 'NOMBRES:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'nombre_asignado',
           null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
        </div>
        <div class="col-3">
            {!! Form::label('apellido_asignado', 'APELLIDOS:', ['class'=>'form-label font-weight-bold']) !!}
            {!! Form::text(
            'apellido_asignado',
           null,
            ['class'=>'form-control','readonly'=>'readonly']) !!}
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

$(document).on('change','#ci_asignado', function(e){
        var ci =  $(this).val();

        $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    type: 'GET',
                    url: "{{ route('get.person') }}",
                    data: {
                        'ci': ci,
                    },
                    success: function(data) {
                        if(data.id_estatus===1){
                            $('#nombre_asignado').val(data.nombre);
                            $('#apellido_asignado').val(data.apellido);
                            $('#id_personal_asignado').val(data.id_personal);
                        }else{
                            alert ('El registro no existe')
                        }
                    },
        });

    });


$(document).on("submit", "#editar_seguimiento", function (e) {
    e.preventDefault();

    if (!$(this).data("locked")) {
        let ruta = $(this).attr("action");
        let data = new Object();
        let campos = $(this).serializeArray();

        //-console.log(campos);

        $(".invalid-feedback", this).remove();

        $(this).data("locked", true);
        $('input[type="submit"]', this).blur();
        $('input[type="submit"]', this).attr("disabled", "disabled");
        $("#foot-notificacion")
            .append(
                `<div class="wait-notification"> <img src="./img/loading.gif" alt="Procesando formulario."
                    style="width: 100px;display: block;">
                  </div>`
            )
            .fadeIn(300);

        campos.forEach(function (val, key) {
            if (val.name === "_token") {
                data[val.name] = val.value;
            } else {
                data[val.name] = val.value.toUpperCase();
            }
            $("#" + val.name).removeClass("is-invalid");
        });

        //-console.log(data);

        $.ajax({
            url: `${ruta}/${data["id"]}`,
            type: "PUT",
            headers: { "X-CSRF-TOKEN": data["_token"] },
            dataType: "json",
            data: data,

            beforeSend: function () {
                $("#foot-notificacion").html(
                    '<p class="info-wait text-center w-100"><strong class="text-danger">Procesando formulario...</strong></p>'
                );
                $("#editar_seguimiento").data("locked", true);
                $('#editar_seguimiento input[type="submit"]').blur();
                $('#editar_seguimiento input[type="submit"]').attr(
                    "disabled",
                    "disabled"
                );
            },

            success: function (res) {
                
                $('.refresh-noticafion').append('<img src="img/loading.gif" style="width:32px"><strong>&nbsp;Actualizando...</strong>').fadeIn(200);

                table.ajax.reload(null, false);

                setTimeout(function() {
                    $('.refresh-noticafion').children().fadeOut(200).empty();
                }, 1000);


                $("form#editar_seguimiento")
                    .before(
                        `<div class="ok-notification notification">Registro exitoso.</div>`
                    )
                    .fadeIn(300);
                $(".modal").modal("hide");

                alert("El correlativo es: "+res.correlativo);
            },

            error: function (res) {
                console.log(res);
                if (res.status == 422) {
                    for (let key in res.responseJSON.errors) {
                        $(`#editar_seguimiento #${key}`).addClass("is-invalid");
                        $(`#editar_seguimiento #${key}`).after(
                            `<span class="invalid-feedback position-absolute" role="alert"><strong>  ${res.responseJSON.errors[key][0]}</strong></span>`
                        );

                        if (
                            $(`#editar_seguimiento #${key}`).hasClass(
                                "chosen-select"
                            )
                        ) {
                            $(
                                `#editar_seguimiento #${key} ~ .chosen-container`
                            ).after(
                                `<span class="invalid-feedback position-absolute" role="alert"><strong>  ${res.responseJSON.errors[key][0]}</strong></span>`
                            );
                            $(
                                `#editar_seguimiento #${key} ~ .chosen-container`
                            ).addClass("is-invalid");
                        } else if (
                            $(`#editar_seguimiento #${key}`).hasClass(
                                "datetimepicker"
                            )
                        ) {
                            $(`#editar_seguimiento #${key}`)
                                .closest("div.input-group")
                                .addClass("is-invalid")
                                .after(
                                    `<span class= "invalid-feedback position-absolute" role = "alert"> <strong>  ${res.responseJSON.errors[key][0]}</strong></span> `
                                );
                        } else {
                            $(`#editar_seguimiento #${key}`).addClass(
                                "is-invalid"
                            );
                            $(`#editar_seguimiento #${key}`).after(
                                `<span class="invalid-feedback position-absolute" role="alert"><strong>  ${res.responseJSON.errors[key][0]}</strong></span>`
                            );
                            if (key === "ciPasaporte") {
                                $(`#editar_seguimiento #ci_pasaporte`).addClass(
                                    "is-invalid"
                                );
                                $(`#editar_seguimiento #ci_pasaporte`).after(
                                    `<span class="invalid-feedback position-absolute" role="alert"><strong>  ${res.responseJSON.errors[key][0]}</strong></span>`
                                );
                            }
                        }
                    }
                } else {
                    $("form#editar_seguimiento").before(
                        `<div class="error-notification notification">${res.status}: Error al procesar su solicitud.</div>`
                    );
                }
            },
            complete: function () {
                $("#editar_seguimiento").data("locked", false);
                $('#editar_seguimiento input[type="submit"]').removeAttr(
                    "disabled"
                );
                $(".info-wait").fadeOut(300);
            },
        });

        setTimeout(function () {
            $(".notification").fadeOut(300);
        }, 3000);
    }
});




</script>
