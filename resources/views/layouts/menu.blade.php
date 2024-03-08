<li class="parent-menu">

    <div class="title-parent">
        <span class="icofont-users-alt-4"></span>
        CORRESPONDENCIA
        <span class="icofont-thin-down float-right"></span>
    </div>

    <ul class="group-menu">
        <li class="intem-menu"><a href="{{route('registro.index')}}"> Registrar Correspondencia</a></li>
		<li class="intem-menu"><a href="{{route('seguimiento.index')}}"> Seguimiento Correspondencia</a></li>
    </ul>

</li>

<li class="parent-menu">

    <div class="title-parent">
        <span class="icofont-search-document"></span>
        CONSULTAS / REPORTES
        <span class="icofont-thin-down float-right"></span>
    </div>

    <ul class="group-menu">
        <li class="intem-menu"><a href="{{route('reportes')}}"> Listado de Correspondencia</a></li>
		<li class="intem-menu"><a href="{{route('reportes')}}"> Agenda</a></li>
    </ul>

</li>

<li class="parent-menu">

    <div class="title-parent">
        <span class="icofont-gear"></span>
        ADMINISTRACIÓN
        <span class="icofont-thin-down float-right"></span>
    </div>

    <ul class="group-menu">
        <li class="intem-menu"><a href="{{route('roles.index')}}"> Roles</a></li>
        <li class="intem-menu"><a href="{{route('usuarios.index')}}"> Usuarios</a></li>
        <li class="intem-menu"><a href="{{route('personal.index')}}"> Personal</a></li>
        <li class="intem-menu"><a href="{{route('gerencia.index')}}"> Gerencias</a></li>
        <li class="intem-menu"><a href="{{route('cargo.index')}}"> Cargo</a></li>
        <li class="intem-menu"><a href="{{route('ente.index')}}"> Ente</a></li>
        <li class="intem-menu"><a href="{{route('role_has_permissions.index')}}"> Roles y Permisos</a></li>
        <li class="intem-menu"><a href="{{ route('permisos.index') }}"> Permiso</a></li>
        <li class="intem-menu"><a href="{{route('nomenclatura.index')}}"> Nomenclatura</a></li>
        <li class="intem-menu"><a href="{{route('firmante.index')}}"> Firmante</a></li>
        {{-- <li class="intem-menu"><a href="{{route('nomenclatura.index')}}"> Nomenclatura</a></li> --}}
        <li class="intem-menu"><a href="{{route('tipo_correspondencia.index')}}"> Correspondencia</a></li>
		<li class="intem-menu"><a href="{{route('area_trabajo.index')}}"> Tipo Correspondencia</a></li>
		<li class="intem-menu"><a href="{{route('estatus.index')}}"> Estatus</a></li>
    </ul>

</li>


