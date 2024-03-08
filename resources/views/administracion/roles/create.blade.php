<div class="card-body">
    <div class="container">
    {!!Form::open(['url'=>'/roles','method'=>'post','id'=>'agregar_registro','class'=>'m-4','data-locked'=>'false','data-crud'=>'add'])!!}
    <div class="row mb-4">
        <div class="col-12">
            {!! Form::label('name', 'ROLES', ['class'=>'form-label font-weight-bold']) !!}
            <small class="text-danger font-italic">Obligatorio</small>
            {!! Form::text(
            'name',
            null,
            ['class'=>'form-control',
            'placeholder'=>'Ingresa el rol']) !!}
        </div>
        <hr>
                      <h3>Asignar Permisos</h3>
            <div class="row">
              <div class="col-12">
                <table class="table table-sm  table-bordered table-striped " style="font-size: 0.8rem" id="tabla2">
                <thead align="center" class="bg-primary">
                    <tr>
                      <th scope="col">#</th>
                      <th scope="col-1">Seleccion</th>
                      <th scope="col">Descripcion</th>
                      <th scope="col">Ruta</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($permisos as $permission)
                    <tr>
                        <td></td>
                      <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox"
                            class="custom-control-input"
                            id="permission_{{$permission->id}}"
                            value="{{$permission->id}}"
                            name="permission[]"

                            @if( is_array(old('permission')) && in_array("$permission->id", old('permission'))    )
                            checked
                            @endif
                            >
                            <label class="custom-control-label"  for="permission_{{$permission->id}}"></label>
                        </div>
                      </td>
                      <td>{{ $permission->descripcion ?? 'Sin Descripcion' }}</td>
                      <td>{{ $permission->name}}</td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
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
</div>

