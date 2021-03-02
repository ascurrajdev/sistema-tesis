<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar-users />
        <x-content-wrapper>
            <x-container-breadcrumb ruta="Agendamientos/Listado"/>
            <x-container class="mt-5">
                    <x-card>
                        <x-slot name="header">
                            <h2>Los detalles de pago:</h2>
                        </x-slot>
                        <x-slot name="body">
                            @if($detalle->pagado)
                                <h2>
                                    El pago fue realizado correctamente 
                                    <i class="ion ion-android-checkmark-circle text-success"></i>
                                </h2>
                            @elseif($detalle->cancelado)
                                <h2>
                                    El pago fue cancelado 
                                    <i class="ion ion-close-circled text-danger"></i>
                                </h2>
                            @else
                                <h2 class="font-weight-light">
                                    <p><span class="font-weight-normal">Metodo de Pago:</span> {{$detalle->forma_pago}}</p>
                                    <p><span class="font-weight-normal">Nro Pedido:</span> {{number_format($detalle->numero_pedido,0,',','.')}}</p>
                                    <p class="text-uppercase">
                                        Debe acercarse a alguna boca de cobranza de <span class="font-weight-normal">{{$detalle->forma_pago}}</span>, mencionando el comercio <span class="font-weight-normal">PAGOPAR</span> y el numero de pedido <span class="font-weight-normal">{{number_format($detalle->numero_pedido,0,',','.')}}</span> o mencionando su CI
                                    </p>
                                    <p><span class="font-weight-normal">Fecha Maxima Pago:</span> {{$detalle->fecha_maxima_pago}}</p>
                                </h2>
                            @endif
                        </x-slot>
                    </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
