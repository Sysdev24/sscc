{!!Form::open(['url'=>'/ente','method'=>'post','id'=>'editar_estatus','class'=>'m-4','data-locked'=>'false','data-crud'=>'edit_estatus'])!!}

{!! Form::hidden('id',$ente->id_ente) !!}
<p class="text-center h4">¿Deseas eliminar el ente {{$ente->descripcion}}?</p>
<p class="text-center display-4">
    {!! Form::submit("SÍ", ['class'=>'btn btn-primary btn-lg']) !!}
    <a class="btn btn-secondary btn-lg" data-dismiss="modal">NO</a>
</p>
<div id="foot-notificacion">

</div>
{!! Form::close() !!}