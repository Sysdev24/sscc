<table id="data-table" class="table table-hover" style="width:60%">
    <thead>
        <th style="text-align: center" width="2%">MOD</th>
		<th style="text-align: center" width="2%">SUSP</th>
        <th style="text-align: center" width="2%">ADJ</th>
        <th style="text-align: center" width="2%">ID REMITENTE</th>
        <th style="text-align: center" width="2%">C.I REMITENTE</th>
        <th style="text-align: center" width="5%">NOMBRES REMITENTE</th>
        <th style="text-align: center" width="5%">APELLIDOS REMITENTE</th>
        <th style="text-align: center" width="5%">CARGO</th>
        <th style="text-align: center" width="5%">GERENCIA</th>
        <th style="text-align: center" width="2%">FECHA</th>
        <th style="text-align: center" width="5%">NRO CORRESPONDENCIA</th>
        <th style="text-align: center" width="5%">ASUNTO</th>
        <th style="text-align: center" width="5%">ENTE</th>
        <th style="text-align: center" width="5%">NOMENCLATURA</th>
        <th style="text-align: center" width="5%">CORRELATIVO</th>
        <th style="text-align: center" width="5%">AÑO</th>
        <th style="text-align: center" width="5%">OBSERVACION</th>
		<th style="text-align: center" width="5%">ESTATUS</th>
        <th style="text-align: center" width="2%">ID ASIGNADO</th>
        <th style="text-align: center" width="2%">C.I ASIGNADO</th>
        <th style="text-align: center" width="5%">NOMBRES ASIGNADO</th>
        <th style="text-align: center" width="5%">APELLIDOS ASIGNADO</th>
    </thead>
</table>

@section('js')

<script>
    const URL_BASE = window.location.protocol + '//' + window.location.host;
let table= $('#data-table').DataTable({

    language: {
        url: 'js/librerias/es-ES.json'
    },
    info:false,
    pageLength: 10,
    order: [[ 2, "asc" ]],
    paging: true,
    lengthChange:false,
    columnDefs: [
        { orderable: false,targets: 0 },
        {
            targets: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21],
             className: 'dt-body-center'
        }
    ],
    ajax: URL_BASE+'/api/registro',
    columns:[
        {data:"id_registro",
            render:function(data, type, row){
                return `<a href="#winEdit" data-registro='${location.href}/${data}/edit'"
                            class="badge badge-primary p-2 openEditWin zebra_tooltips_td border border-success rounded-circle"
                            data-backdrop="static" data-target="#winEdit" data-toggle="modal" data-placement="bottom"
                            title="Editar"><span class="icofont-ui-edit text-white "></span></a>`
            }
        },

        {
                    data: "estatus_registro",
                    render: function(data, type, row) {
                        if (data === 1) {
                            icono = 'icofont-ui-check';
                            style = 'bg-success'
                        } else {
                            icono = 'icofont-ui-close';
                            style = 'bg-danger'
                        }

            return `<label style="visibility: hidden;">${data}</label>
            <a href="#winEditEstatus" data-registro="${URL_BASE}/registro/${row.id_registro}"
                        class="badge p-2 openEditStatusWin zebra_tooltips_td border rounded-circle ${style}"
                        data-backdrop="static" data-target="#winEditEstatus" data-toggle="modal" data-placement="bottom"
                        title="Desactivar">
                        <span class="text-white ${icono}">
                        </span>
                    </a>`
           }
        }, 
                                    /******  ANEXAR DOCUMENTO */
        { data:"id_registro",
            render:function(data, type, row){

                return  `<a href="#winSubir" data-registro='${location.href}/${data}/anexar_documento'"
                            class="badge badge-primary p-2 winAnexar zebra_tooltips_td border border-success rounded-circle"
                            data-backdrop="static" data-target="#winSubir" data-toggle="modal" data-placement="bottom"
                            title="Anexar Documento"><span class="icofont-attachment text-white "></span></a>`;
              
            }
        },

        {data:"id_remitente"},
        {data:"ci"},
        {data:"nombre"},
        {data:"apellido"},
        {data:"cargo"},
        {data:"gerencia"},
		{data:"fecha"},
		{data:"nro_correspondencia"},
		{data:"asunto"},
        {data:"ente"},
        {data:"nomenclatura"},
        {data:"correlativo"},
        {data:"anno"},
        {data:"observacion"},
        {data:"estatus"},
        {data:"id_asignado"},
        {data:"ci_asignado"},
        {data:"nombre_asignado"},
        {data:"apellido_asignado"},
        ]
});

$(document).on('click','.print', function(e){
    e.preventDefault();

    window.open(`${URL_BASE}/seguimiento/anexar_documento/${$(this).data('registro')}`,'Anexar Documento','_blank',"height=120,width=120,menubar=no,status=no,toolbar=no,resizable=no"); 
})


$('#ci').on('change', function(){ 
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
                            $('#nombre').val(data.nombre);
                            $('#apellido').val(data.apellido);
                            $('#id_personal').val(data.id_personal);
                        }else{
                            alert ('El registro no existe')
                        }
                    },
        });

    });

    
    
$('#ci_asignado').on('change', function(){ 
        var ci =  $(this).val();

        $.ajax({
                    headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
                    type: 'GET',
                    url: "{{ route('get.person_asignado') }}",
                    data: {
                        'ci': ci_asignado,
                    },
                    success: function(data) {
                        if(data.id_estatus===1){
                            $('#nombre').val(data.nombre_asignado);
                            $('#apellido').val(data.apellido_asignado);
                            $('#id_personal').val(data.id_personal);
                        }else{
                            alert ('El registro no existe')
                        }
                    },
        });

    });
    
    
    
    
    // $('#serial').on('change', function(){ 
    //     var serial =  $(this).val();

    //     $.ajax({
    //                 headers: {'X-CSRF-TOKEN': '{{ csrf_token() }}'},
    //                 type: 'GET',
    //                 url: "{{ route('get.serial') }}",
    //                 data: {
    //                     'serial': serial,
    //                 },
    //                 success: function(data) {
    //                     if(data.id_estatus===1){
    //                         $('#equipo').val(data.equipo);
    //                         $('#tipo').val(data.tipo);
    //                         $('#accesorios').val(data.accesorios);
    //                         $('#id_equipo_componente').val(data.id_equipo_componente);
    //                     }else{
    //                        alert ('El registro no existe')
    //                     }
    //                 },
    //     });

    // }); 

</script>

<script>
            $('input[name="archivo"]').on('change', function(){
              var ext = $( this ).val().split('.').pop();
              if ($( this ).val() != '') {
                if(ext == "pdf"){
                  //alert("La extensión es: " + ext);
                  if($(this)[0].files[0].size > 2097152){
                    //console.log(window.location.href);
                    alert("¡Advertencia! - El documento excede el tamaño máximo por favor verifique e intente de nuevo")
                    ext.value='',
                    $(this).val('');
                  }else{
                    //$("#modal-gral").hide();
                  }
                }
                else
                {
                  $( this ).val('');
                  alert("Tipo de Documento no permitido: " + ext);
                }
              }
            });
            </script>
@endsection
