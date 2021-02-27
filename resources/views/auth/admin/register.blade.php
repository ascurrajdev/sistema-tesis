<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
    @endpush
    <x-box-login>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrate como nuevo colaborador</p>
                @error('register')
                    <div class="alert alert-danger">{{$message}}</div>
                @endif
                @if(session('registered'))
                    <div class="alert alert-success">{{session('registered')}}</div>
                @endif
            <form action="{{url('/admin/register')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" placeholder="Nombre Completo">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('nombre')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    @error('email')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                    @enderror
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input-phone />
                    @error('telefono')
                        <div class="text-danger">{{$message}}</div>
                    @enderror
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                    <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                        <label for="agreeTerms">
                            Acepto los <a href="#">terminos</a>
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Registrate</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <a href="{{route('admin.login')}}" class="text-center">Ya estoy registrado como colaborador</a>
            </div>
            <!-- /.form-box -->
        </div>
    </x-box-login>
</x-app>