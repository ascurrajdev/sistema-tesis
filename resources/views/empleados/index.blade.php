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
                        <h3>Listado de empleados</h3>
                    </x-slot>
                    <x-slot name="body">
                        <table class="table table-striped table-borderless mb-5">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Email</th>
                                    <th>Telefono</th>
                                    <th>Role</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(empty($empleados->count()))
                                    <tr>
                                        <td colspan="4">
                                            <h3>No hay registros</h3>
                                        </td>
                                    </tr>
                                @endif
                                @foreach($empleados as $empleado)
                                    <tr>
                                        <td>{{$empleado->name}}</td>
                                        <td>{{$empleado->email}}</td>
                                        <td>{{$empleado->telefono}}</td>
                                        <td>{{$empleado->role->nombre}}</td>
                                        <td>
                                            <a href="{{route('admin.empleados.edit',$empleado->id)}}" class="btn btn-success">
                                                <i class="fas fa-user-edit"></i>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{$empleados->links()}}
                    </x-slot>
                </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
