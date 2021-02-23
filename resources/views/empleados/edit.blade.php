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
                        <h3>Editar Empleado:</h3>
                    </x-slot>
                    <x-slot name="body">
                        
                        <form action="{{route('admin.empleados.update',$empleado->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="nombre" value="{{$empleado->name}}" />
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{$empleado->email}}"/>
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="telefono">Telefono:</label>
                                <input type="text" class="form-control @error('telefono') is-invalid @enderror" name="telefono" id="telefono" value="{{$empleado->telefono}}"/>
                                @error('telefono')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Role:</label>
                                <select name="role_id" id="role" class="form-control @error('telefono') is-invalid @enderror">
                                    @foreach($roles as $role)
                                        @if($empleado->role_id == $role->id)
                                            <option value="{{$role->id}}" selected>{{$role->nombre}}</option>
                                        @else
                                            <option value="{{$role->id}}">{{$role->nombre}}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @error('role_id')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn btn-success" type="submit">
                                <i class="fas fa-save"></i>
                                Guardar cambios
                            </button>
                        </form>
                    </x-slot>
                </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
