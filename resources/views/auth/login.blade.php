<x-app>
    <x-box-login>
        @push('css')
            <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
        @endpush
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b> Sistema Tesis</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar session</p>

            <form action="{{url('/login')}}" method="POST">
                @csrf
                <div class="input-group mb-3">
                    <input type="email" class="form-control" name="email" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    <x-error-validation field="email"/>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    <x-error-validation field="password" />
                </div>
                <div class="row">
                <div class="col-8">
                    <div class="icheck-primary">
                        <input type="checkbox" id="remember">
                        <label for="remember">
                            Recordarme
                        </label>
                    </div>
                </div>
                <!-- /.col -->
                <div class="col-4">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <!-- /.col -->
                </div>
            </form>

            <div class="social-auth-links text-center mb-3">
                <p>- OR -</p>
                <a href="{{route('login.proveedor.callback',array('proveedor'=>'facebook'))}}" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i> Inicia session con Facebook
                </a>
                <a href="{{route('login.proveedor.callback',array('proveedor'=>'google'))}}" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i> Inicia session con Google+
                </a>
            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">Olvidaste tu contraseña?</a>
            </p>
            <p class="mb-0">
                <a href="{{route('register')}}" class="text-center">Registrate como un nuevo miembro</a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </x-box-login>
</x-app>
