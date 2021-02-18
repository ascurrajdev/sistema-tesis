<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar />
        <x-content-wrapper>
            <x-container-breadcrumb ruta="Home/Dashboard" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$agendamientos}}</h3>

                                <p>Reservas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-calendar-outline"></i>
                            </div>
                            <a href="{{route('agendamientos.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>{{$usuarios}}</h3>
                                <p>Usuarios</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-contact"></i>
                            </div>
                            <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$empleados}}</h3>
                                <p>Empleados</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-android-people"></i>
                            </div>
                            <a href="#" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3>{{$servicios}}</h3>
                                <p>Servicios</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-pricetags-outline"></i>
                            </div>
                            <a href="{{route('servicios.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
