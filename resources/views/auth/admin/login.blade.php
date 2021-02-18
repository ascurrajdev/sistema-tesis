<x-app>
    <x-box-login>
        @push('css')
            <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}" />        
        @endpush
        <div class="login-logo">
            <a href="#"><b>Admin</b> Sistema Tesis</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
            <p class="login-box-msg">Iniciar session</p>

            <form action="{{url('/admin/login')}}" method="POST">
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
                        <input type="checkbox" name="remeber" id="remember">
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

            <!-- /.social-auth-links -->

            <p class="mb-1">
                <a href="forgot-password.html">Olvidaste tu contraseña?</a>
            </p>
            <p class="mb-0">
                <a href="{{route('admin.register')}}" class="text-center">Registrate como un nuevo colaborador</a>
            </p>
            </div>
            <!-- /.login-card-body -->
        </div>
    </x-box-login>
</x-app>
