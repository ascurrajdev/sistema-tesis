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
                <x-card>
                    <x-slot name="header">
                        <h3>Modificar servicio:</h3>
                    </x-slot>
                    <x-slot name="body">
                        <form action="{{route('servicios.update',$servicio->id)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="nombre">Nombre:</label>
                                <input type="text" value="{{$servicio->titulo}}" id="nombre" class="form-control" name="titulo"/>
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripcion:</label>
                                <textarea name="descripcion" id="descripcion" class="form-control">{{$servicio->descripcion}}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio:</label>
                                <input-monto value="{{$servicio->precio}}"/>
                            </div>
                            <button type="submit" class="btn btn-success">
                                <i class="ion ion-edit"></i>
                                Modificar
                            </button>
                            <a href="{{route('servicios.index')}}" class="btn btn-info">
                                <i class="fas fa-chevron-left"></i>
                                Back
                            </a>
                        </form>
                    </x-slot>
                </x-card>
            </x-container>
        </x-content-wrapper>
        <x-footer />
    </x-app-wrapper>
</x-app>
