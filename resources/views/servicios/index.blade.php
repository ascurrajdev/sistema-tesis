<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
    @endpush
    <x-app-wrapper>
        <x-navbar-header />
        <x-main-sidebar />
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
                        <h3>Listado de servicios</h3>
                    </x-slot>
                    <x-slot name="body">
                        <table class="table table-striped table-borderless mb-5">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Precio</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($servicios->count()))
                                    <tr>
                                        <td colspan="4">
                                            <h3>No hay registros</h3>
                                        </td>
                                    </tr>
                                @endif
                                @foreach($servicios as $servicio)
                                    <tr>
                                        <td>{{$servicio->titulo}}</td>
                                        <td>{{$servicio->descripcion}}</td>
                                        <td>Gs. {{number_format($servicio->precio)}}</td>
                                        <td>
                                            <a href="{{route('servicios.edit',$servicio->id)}}" class="btn btn-success">Modificar</a>
                                            <form action="{{route('servicios.destroy',$servicio->id)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Eliminar</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$servicios->links()}}
                    </x-slot>
                </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
