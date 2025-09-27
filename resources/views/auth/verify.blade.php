<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Verificar Correo - Olimpiada Argentina de Ciencias {{ date('Y') }}</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    @yield('css')
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    <link rel='shortcut icon' type='image/x-icon' href="{{ asset('favicon.ico') }}" />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        @include('sweetalert::alert')
        <section class="section">
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-5">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Verifica tu correo electrónico</h4>
                            </div>
                            <div class="card-body">
                                @if (session('resent'))
                                    <div class="alert alert-success" role="alert">
                                        Se ha enviado un nuevo enlace de verificación a tu correo.
                                    </div>
                                @endif

                                <p class="text-muted text-center">
                                    Antes de continuar, revisa tu correo para el enlace de verificación.
                                </p>
                                <small class="text-muted">
                                    Si no recibiste el email, solicita otro enlace.
                                </small>
                                <hr>

                                <form method="POST" action="{{ route('verification.resend') }}" class="needs-validation">
                                    @csrf
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Solicitar nuevo enlace
                                        </button>
                                    </div>
                                </form>
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
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>

</html>

