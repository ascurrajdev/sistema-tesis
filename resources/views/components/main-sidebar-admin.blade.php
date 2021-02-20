<x-main-sidebar>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
        <i class="nav-icon far fa-calendar-alt"></i>
            <p>
                Agendamientos
                <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admin.agendamientos.index')}}" class="nav-link">
                    <i class="fas fa-calendar-day nav-icon"></i>
                    Todas las reservas
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('admin.agendamientos.create')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-plus"></i>
                    Nueva Reserva
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon ion ion-ios-pricetags-outline"></i>
                <p>
                    Servicios
                    <i class="right fas fa-angle-left"></i>
                </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admin.servicios.index')}}" class="nav-link">
                    <i class="nav-icon ion ion-clipboard"></i>
                    Todos los servicios
                </a>
            </li>
            @if(auth_user()->can('create-servicio'))
                <li class="nav-item">
                    <a href="{{route('admin.servicios.create')}}" class="nav-link">
                        <i class="nav-icon ion ion-ios-plus-outline"></i>
                        Nuevo Servicio
                    </a>
                </li>
            @endif
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon ion ion-android-contact"></i>
            <p>
            Usuarios
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admin.usuarios.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                    Todos los usuarios
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item has-treeview">
        <a href="#" class="nav-link">
            <i class="nav-icon fas fa-user-tie"></i>
            <p>
            Empleados
            <i class="right fas fa-angle-left"></i>
            </p>
        </a>
        <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{route('admin.empleados.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                    Todos los empleados
                </a>
            </li>
        </ul>
    </li>     
</x-main-sidebar>