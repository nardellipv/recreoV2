<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>Otika - Admin Dashboard Template</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/css/app.min.css">
    <link rel="stylesheet" href="assets/bundles/jquery-selectric/selectric.css">
    <link rel="stylesheet" href="assets/bundles/select2/dist/css/select2.min.css">
    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel='shortcut icon' type='image/x-icon' href='assets/img/favicon.ico' />
</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12">
                        @include('alerts.error')
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Registrar Colegio</h4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label>Provincia</label>
                                            <select class="form-control select2" name="province_id"
                                                onchange="window.location.href=this.options[this.selectedIndex].value;">
                                                @if(request()->input(['provincia']))
                                                <option value="{{ $provinceName->id }}">{{ $provinceName->name }}
                                                </option>
                                                <option readonly>-----------------------------</option>
                                                @else
                                                <option value="">Seleccione una provincia</option>
                                                @endif
                                                @foreach($provinces as $province)
                                                <option value="{{ route('register', ['provincia'=>$province->id]) }}">
                                                    {{ $province->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-6">
                                            <label>Localidad</label>
                                            <select class="form-control select2" name="region_id">
                                                @if(isset($regions))
                                                    @foreach($regions as $region)
                                                        <option value={{ $region->id }}>{{ $region->name }}</option>
                                                    @endforeach
                                                @else
                                                    <option value="">Seleccione una localidad</option>
                                                @endif
                                            </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="frist_name">Nombre</label>
                                            <input id="name" type="text"
                                                class="form-control @error('name') is-invalid @enderror" name="name"
                                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                                            @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="last_name">Email</label>
                                            <input id="email" type="email"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email">

                                            @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>                                    

                                    <div class="form-group">
                                        <label for="email">Dirección</label>
                                        <input id="address" type="text"
                                            class="form-control @error('address') is-invalid @enderror" name="address"
                                            value="{{ old('address') }}" required autocomplete="address">

                                        @error('address')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="postal_code">Código Postal</label>
                                            <input id="postal_code" name="postal_code" type="number"
                                                class="form-control number @error('postal_code') is-invalid @enderror"
                                                name="postal_code" value="{{ old('postal_code') }}" required 
                                                autocomplete="postal_code" autofocus>

                                            @error('postal_code')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="phone">Teléfono</label>
                                            <input id="phone" type="phone"
                                                class="form-control @error('phone') is-invalid @enderror" name="phone"
                                                value="{{ old('phone') }}" required autocomplete="phone">

                                            @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="director1">Director</label>
                                            <input id="director1" type="text"
                                                class="form-control @error('director1') is-invalid @enderror"
                                                name="director1" value="{{ old('director1') }}" required
                                                autocomplete="director1" autofocus>

                                            @error('director1')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="director2">Vice Director</label>
                                            <input id="director2" type="director2"
                                                class="form-control @error('director2') is-invalid @enderror"
                                                name="director2" value="{{ old('director2') }}" required
                                                autocomplete="director2">

                                            @error('director2')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label class="d-block">Gestión</label>
                                            <div class="form-check form-check-inline">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="type" value="PUBLICA"
                                                        class="selectgroup-input-radio" required>
                                                    <span class="selectgroup-button">Gestión Publica</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="type" value="PRIVADA"
                                                        class="selectgroup-input-radio">
                                                    <span class="selectgroup-button">Gestión Privada</span>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group col-6">
                                            <label class="d-block">Pariticipación del colegio</label>
                                            <div class="form-check form-check-inline">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="first_time" value="SI"
                                                        class="selectgroup-input-radio" required>
                                                    <span class="selectgroup-button">Participo por primera
                                                        vez</span>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <label class="selectgroup-item">
                                                    <input type="radio" name="first_time" value="NO"
                                                        class="selectgroup-input-radio">
                                                    <span class="selectgroup-button">Ya participe con
                                                        anterioridad</span>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-6">
                                            <label for="password" class="d-block">Contraseña</label>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">

                                            @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                        <div class="form-group col-6">
                                            <label for="password2" class="d-block">Confirmar Contraseña</label>
                                            <input id="password-confirm" type="password" class="form-control"
                                                name="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                                            Registrar Colegio
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="mb-4 text-muted text-center">
                                Mi colegio ya esta registrado <a href="{{ route('login') }}">Ingresar</a>
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
    <script src="assets/bundles/jquery-pwstrength/jquery.pwstrength.min.js"></script>
    <script src="assets/bundles/jquery-selectric/jquery.selectric.min.js"></script>
    <script src="assets/bundles/select2/dist/js/select2.full.min.js"></script>
    <!-- Page Specific JS File -->
    <script src="assets/js/page/auth-register.js"></script>
    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <!-- Custom JS File -->
    <script src="assets/js/custom.js"></script>
</body>

</html>