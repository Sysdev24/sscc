{!!Form::open(['url'=>'/tipo_correspondencia','method'=>'post','id'=>'editar_estatus','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit_estatus'])!!}

{!! Form::hidden('id',$tipo_correspondencia->id_tipo_correspondencia !!}
<p class="text-center h4">¿Deseas eliminar Correspondencia {{$tipo_correspondencia->descripcion}}?</p>
<p class="text-center display-4">
    {!! Form::submit("SÍ", ['class'=>'btn btn-primary btn-lg']) !!}
    <a class="btn btn-secondary btn-lg" data-dismiss="modal">NO</a>
</p>
<div id="foot-notificacion">

</div>
{!! Form::close() !!}