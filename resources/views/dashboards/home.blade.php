<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar-users />
        <x-content-wrapper>
            <x-container-breadcrumb ruta="Home/Dashboard" />
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{auth_user()->agendamientos->count()}}</h3>
                                <p>Reservas</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-ios-calendar-outline"></i>
                            </div>
                            <a href="{{route('agendamientos.index')}}" class="small-box-footer">Mas info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
