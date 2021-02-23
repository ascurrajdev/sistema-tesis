<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar-admin />
        <x-content-wrapper>
            <x-container-breadcrumb ruta="Agendamientos/Crear"/>
            <x-container>
                @if(session('update'))
                    <div class="alert alert-success">{{session('update')}}</div>
                @endif
                @if(session('destroy'))
                    <div class="alert alert-success">{{session('destroy')}}</div>
                @endif
                @if(session('create'))
                    <div class="alert alert-success">{{session('create')}}</div>
                @endif
                <x-card>
                    <x-slot name="header">
                        <h3>Listado de usuarios</h3>
                    </x-slot>
                    <x-slot name="body">
                        <table class="table table-striped table-borderless mb-5">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Reservaciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($usuarios->count()))
                                    <tr>
                                        <td colspan="4">
                                            <h3>No hay registros</h3>
                                        </td>
                                    </tr>
                                @endif
                                @foreach($usuarios as $usuario)
                                    <tr>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                            <a href="{{route('admin.usuarios.agendamientos.historial',$usuario->id)}}" class="btn btn-success">
                                                {{$usuario->agendamientos_count}}
                                                <i class="far fa-eye"></i>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$usuarios->links()}}
                    </x-slot>
                </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
