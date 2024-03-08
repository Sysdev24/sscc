@extends('layouts.app')

@section('content')
{{-- VENTANA PARA AGREGAR NUEVO USUARIO --}}
<div class="modal fade" id="winAgregarRegistro" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title " id="exampleModalLongTitle">REGISTRAR ENTE</h5>
                <a type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true" class="icofont-close-squared-alt"></span>
                </a>
            </div>
            <div class="modal-body">
                @include('administracion/ente/create')
            </div>
        </div>
    </div>
</div>
{{--
==============================================================================================================
--}}

{{-- ZONA PARA MODIFICAR NUEVO USUARIO --}}
<div class="modal fade" id="winEditEstatus" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title " id="exampleModalLongTitle">ELIMINAR ENTE</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true" class="icofont-close-squared-alt"></span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{--
==============================================================================================================
--}}

{{-- ZONA PARA GERENCIA --}}
<div class="modal fade" id="winEdit" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-light">
                <h5 class="modal-title " id="exampleModalLongTitle">MODIFICAR ENTE</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true" class="icofont-close-squared-alt"></span>
                </button>
            </div>
            <div class="modal-body">

            </div>
        </div>
    </div>
</div>
{{--
==============================================================================================================
--}}

<div class="container">
    <div class="breadcrumbs">
        <FONT COLOR="white">
        <h2 class="mb-3 ml-3 font-weight-bold"><a href="{{route('registro.index')}}">
                <span class="icofont-home"></span>
            </a> / ENTE</h2></FONT>
    </div>
    <div class="row justify-content-center">

        <div class="col-md-12">
            <div class="card shadow">

                {{-- <div class=" text-center text-danger p-2  w-100 update-message" style="height: 64px;">

                </div> --}}

                <div class="card-body">

                    <div class="d-flex mr-1 mb-2 justify-content-between">
                        <div class="refresh-noticafion" style="height: 32px;">

                        </div>
                        <div class="text-center mb-3 ">
                            <a id="openAddWin" href="#winAgregarRegistro" class="btn btn-primary btn-md d-md-flex px-4 "
                                type="button" class="btn btn-primary zebra_tooltips" data-toggle="modal"
                                data-target="#winAgregarRegistro" title="Agregar nuevo ente">
                                <span class="icofont-ui-add"></span>
                            </a>
                        </div>
                    </div>

                    <div id="tabla_registros" class="tabla_movimientos">
                        @include('administracion.ente.listado')
                    </div>

                </div>

            </div>
        </div>

    </div>

</div>
@endsection
