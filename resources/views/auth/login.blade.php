<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Olimpiada Argentina de Ciencias {{ date('Y') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('favicon.ico') }}" />
    <style>
        body {
            background-color: #f0f2f5;
        }
    </style>
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        @include('sweetalert::alert')
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                        <div class="alert alert-info text-center">
                            Si es tu primer acceso en {{ date('Y') }}, deberás registrarte como Colegio aunque hayas
                            participado el año pasado.
                        </div>
                        <div class="card card-primary shadow-lg border-0">
                            <div class="card-header">
                                <h4 class="text-center">Ingresar</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                                    @csrf

                                    <div class="form-group">
                                        <label for="email_school">Email</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
                                            </div>
                                            <input id="email_school" type="email"
                                                class="form-control @error('email_school') is-invalid @enderror"
                                                name="email_school" value="{{ old('email_school') }}"
                                                placeholder="Email del colegio" required autocomplete="email_school"
                                                autofocus>
                                            @error('email_school')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Contraseña</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text"><i class="fas fa-lock"></i></div>
                                            </div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" placeholder="Contraseña del colegio" required
                                                autocomplete="current-password">
                                            @error('password')
                                                <span class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-row align-items-center mb-3">
                                        <div class="col">
                                            <div class="custom-control custom-checkbox mb-0">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="custom-control-label" for="remember-me">Recordarme</label>
                                            </div>
                                        </div>
                                        @if (Route::has('password.request'))
                                            <div class="col-auto">
                                                <a href="{{ route('password.request') }}" class="text-small">
                                                    ¿Olvidaste tu contraseña?
                                                </a>
                                            </div>
                                        @endif
                                    </div>


                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>

                                <div class="text-center mt-4 mb-2">
                                    <span class="text-muted">¿No tenés cuenta?</span>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        @if ($registerSchool->status_button == '1')
                                            <a href="{{ route('register') }}"
                                                class="btn btn-outline-warning btn-lg btn-block">
                                                Registrar Colegio
                                            </a>
                                        @else
                                            <button class="btn btn-outline-warning btn-lg btn-block" disabled>
                                                Registrar Colegio
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3 text-center text-muted">
                            <small>© {{ date('Y') }} Olimpiada Argentina de Ciencias</small>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- General JS Scripts -->
    <script src="{{ asset('assets/js/app.min.js') }}"></script>
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <!-- Custom JS File -->
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>

</html>
