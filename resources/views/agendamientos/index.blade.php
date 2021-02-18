<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar />
        <x-content-wrapper>
            <x-container-breadcrumb ruta="Agendamientos/Listado"/>
            <x-container class="mt-5">
                @if(session('created'))
                    <div class="alert alert-success">{{session('created')}}</div>
                @endif
                @if(session('payment_success'))
                    <div class="alert alert-success">{{session('payment_success')}}</div>
                @endif
                @if(session('payment_error'))
                    <div class="alert alert-danger">{{session('payment_error')}}</div>
                @endif
                @if(empty($agendamientos->count()))
                    <h1 class="text-center">
                    <i class="ion ion-ios-search-strong"></i>
                    No se encuentran agendamientos...</h1>
                @endif
                @foreach($agendamientos as $agendamiento)
                    <x-card>
                        <x-slot name="header">
                            <div class="float-left">
                                <i class="ion ion-calendar mr-3"></i>
                                {{$agendamiento->start->format('d/m/Y H:i')}} - {{$agendamiento->end->format('d/m/Y H:i')}}
                            </div>
                            <div class="float-right">
                                @if($agendamiento->estado_id == 1)
                                    <a class="btn btn-danger" href='{{url("/agendamientos/{$agendamiento->id}/pagar")}}'>Completar la reserva antes del: {{$agendamiento->fecha_maxima_confirmacion->format('d-m-Y')}}</a>
                                @endif
                            </div>
                        </x-slot>
                        <x-slot name="body">
                            <div class="timeline">
                                @foreach($agendamiento->historial->groupBy('fecha_operacion') as $fecha => $operaciones)
                                    <div class="time-label">
                                        <span class="bg-red">{{date("d-m-Y",strtotime($fecha))}}</span>
                                    </div>
                                    @foreach($operaciones as $operacion)
                                        <div>
                                            <i class="fas fa-user bg-green"></i>
                                            <div class="timeline-item">
                                                <div class="time">{{$operacion->created_at->isoFormat('HH:mm')}}</div>
                                                <h3 class="timeline-header no-border">{{$operacion->descripcion}}</h3>
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                                <div>
                                    <i class="fas fa-clock bg-gray"></i>
                                </div>
                            </div>
                        </x-slot>
                    </x-card>
                @endforeach
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
