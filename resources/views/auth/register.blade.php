<x-app>
    @push('css')
        <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
    @endpush
    <x-box-login>
        <div class="card">
            <div class="card-body register-card-body">
                <p class="login-box-msg">Registrate como nuevo miembro</p>
                @error('register')
                    <div class="alert alert-danger">{{$message}}</div>
                @endif
                @if(session('register'))
                    <div class="alert alert-success">{{session('register')}}</div>
                @endif
            <form action="{{url('/register')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" name="name" placeholder="Nombre Completo">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Repetir contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
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

            <div class="social-auth-links text-center">
                <p>- O Tambien -</p>
                <a href="{{route('register.proveedor.redirect',['proveedor'=>'facebook'])}}" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Registrate con Facebook
                </a>
                <a href="{{route('register.proveedor.redirect',['proveedor'=>'google'])}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Registrate con Google+
                </a>
            </div>

            <a href="{{route('login')}}" class="text-center">Ya estoy registrado como miembro</a>
            </div>
            <!-- /.form-box -->
        </div>
    </x-box-login>
</x-app>