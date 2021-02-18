<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{asset('assets/img/admin.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Panel de Control</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{auth_user()->avatar}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="{{route('home')}}" class="d-block">{{auth_user()->name}}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Panel de control
              </p>
            </a>
          </li>
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
                  <a href="{{route('servicios.index')}}" class="nav-link">
                    <i class="nav-icon ion ion-clipboard"></i>
                    Todos los servicios
                  </a>
                </li>
                @if(auth_user()->can('create-servicio'))
                  <li class="nav-item">
                    <a href="{{route('servicios.create')}}" class="nav-link">
                      <i class="nav-icon ion ion-ios-plus-outline"></i>
                      Nuevo Servicio
                    </a>
                  </li>
                @endif
              </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>