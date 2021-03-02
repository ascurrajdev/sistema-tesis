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
                <a href="{{route('agendamientos.index')}}" class="nav-link">
                    <i class="fas fa-calendar-day nav-icon"></i>
                    Todas las reservas
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('agendamientos.create')}}" class="nav-link">
                    <i class="nav-icon far fa-calendar-plus"></i>
                    Nueva Reserva
                </a>
            </li>
        </ul>
    </li>
    <li class="nav-item">
        <a href="{{route('facturacion.listado')}}" class="nav-link">
            <i class="nav-icon fas fa-file-invoice"></i>
            Facturacion
        </a>
    </li>
</x-main-sidebar>