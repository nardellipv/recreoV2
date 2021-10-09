<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Olimpiadas de Ciencia {{ date('Y') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('favicon.ico')}}" />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div
                        class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Ingresar</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('login') }}" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <label for="email_school">Email</label>
                                        <input id="email_school" type="email"
                                            class="form-control @error('email_school') is-invalid @enderror"
                                            name="email_school" value="{{ old('email_school') }}"
                                            placeholder="Email del colegio" required autocomplete="email_school"
                                            autofocus>
                                        @error('email_school')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">Contraseña</label>
                                            {{-- <div class="float-right">
                                                <a href="auth-forgot-password.html" class="text-small">
                                                    ¿Olvide mi contraseña?
                                                </a>
                                            </div> --}}
                                        </div>
                                        <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            placeholder="Contraseña del colegio" required
                                            autocomplete="current-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input"
                                                tabindex="3" id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember-me">Recordarme</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            Ingresar
                                        </button>
                                    </div>
                                </form>
                                <div class="text-center mt-4 mb-3">
                                    <div class="text-job text-muted">Registrar Colegio</div>
                                </div>
                                <div class="row sm-gutters">
                                    <div class="col-12">
                                        @if($registerSchool->status_button == '1')
                                        <a href="{{ route('register') }}" type="submit"
                                            class="btn btn-warning btn-lg btn-block" tabindex="4">
                                            Registrar Colegio
                                        </a>
                                        @else
                                        <a href="#" type="submit" class="btn btn-warning btn-lg btn-block disabled"
                                            tabindex="4">
                                            Registrar Colegio
                                        </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- General JS Scripts -->
    <script src="assets/js/app.min.js"></script>
    <!-- JS Libraies -->
    <!-- Page Specific JS File -->
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>

</html>