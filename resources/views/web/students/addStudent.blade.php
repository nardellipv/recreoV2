@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    @include('alerts.error')
                    <div class="card">
                        <div class="card-header">
                            <h4>Agregar nuevo Alumno</h4>
                        </div>
                        <form action="{{ route('student.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Nombre</label>
                                        <input type="text"
                                            class="form-control @error('name_student') is-invalid @enderror" id="inputName"
                                            name="name_student" placeholder="Nombre" value="{{ old('name_student') }}"
                                            required>
                                        @error('name_student')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputLastName">Apellido</label>
                                        <input type="text"
                                            class="form-control @error('lastname_student') is-invalid @enderror"
                                            id="inputLastName" name="lastname_student" placeholder="Apellido"
                                            value="{{ old('lastname_student') }}" required>
                                        @error('lastname_student')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPhone">Teléfono</label>
                                        <input type="text"
                                            class="form-control @error('phone_student') is-invalid @enderror"
                                            id="inputPhone" name="phone_student" placeholder="Teléfono"
                                            value="{{ old('phone_student') }}" required>
                                        @error('phone_student')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputDNI">DNI</label>
                                        <input type="text"
                                            class="form-control @error('dni_student') is-invalid @enderror" id="inputDNI"
                                            name="dni_student" placeholder="DNI" value="{{ old('dni_student') }}" required>
                                        @error('dni_student')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputBirthDate">Fecha Nacimiento</label>
                                        <input type="date" name="birth_date" id="inputBirthDate"
                                            class="form-control @error('birth_date') is-invalid @enderror"
                                            value="{{ old('birth_date') }}" required>
                                        @error('birth_date')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for="inputEmail">Email</label>
                                        <input type="email"
                                            class="form-control @error('email_student') is-invalid @enderror"
                                            id="inputEmail" name="email_student" placeholder="Email"
                                            value="{{ old('email_student') }}">
                                        @error('email_student')
                                            <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-4">
                                        <label class="d-block">Nivel en el que participa</label>
                                        @foreach (['1' => 'Nivel 1', '2' => 'Nivel 2'] as $val => $label)
                                            <label class="selectgroup-item form-check form-check-inline">
                                                <input type="radio" name="level_student" value="{{ $val }}"
                                                    class="selectgroup-input-radio" required
                                                    {{ old('level_student') == $val ? 'checked' : '' }}>
                                                <span class="selectgroup-button">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('level_student')
                                            <div class="text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="d-block">Nivel de estudio</label>
                                        @foreach (['PRIMARIA' => 'Primaria', 'SECUNDARIA' => 'Secundaria'] as $val => $label)
                                            <label class="selectgroup-item form-check form-check-inline">
                                                <input type="radio" name="classroom" value="{{ $val }}"
                                                    class="selectgroup-input-radio" required
                                                    {{ old('classroom') == $val ? 'checked' : '' }}>
                                                <span class="selectgroup-button">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('classroom')
                                            <div class="text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-4">
                                        <label class="d-block">¿Tiene Beca Progresar?</label>
                                        @foreach (['SI' => 'Sí', 'NO' => 'No'] as $val => $label)
                                            <label class="selectgroup-item form-check form-check-inline">
                                                <input type="radio" name="have_beca" value="{{ $val }}"
                                                    class="selectgroup-input-radio" required
                                                    {{ old('have_beca') == $val ? 'checked' : '' }}>
                                                <span class="selectgroup-button">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('have_beca')
                                            <div class="text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="d-block">Participación con anterioridad</label>
                                        @foreach (['SI' => 'Participo por primera vez', 'NO' => 'Ya he participado con anterioridad'] as $val => $label)
                                            <label class="selectgroup-item form-check form-check-inline">
                                                <input type="radio" name="first_time_student"
                                                    value="{{ $val }}" class="selectgroup-input-radio" required
                                                    {{ old('first_time_student') == $val ? 'checked' : '' }}>
                                                <span class="selectgroup-button">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('first_time_student')
                                            <div class="text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="d-block">Género</label>
                                        @foreach (['MASCULINO' => 'Masculino', 'FEMENINO' => 'Femenino'] as $val => $label)
                                            <label class="selectgroup-item form-check form-check-inline">
                                                <input type="radio" name="genre" value="{{ $val }}"
                                                    class="selectgroup-input-radio" required
                                                    {{ old('genre') == $val ? 'checked' : '' }}>
                                                <span class="selectgroup-button">{{ $label }}</span>
                                            </label>
                                        @endforeach
                                        @error('genre')
                                            <div class="text-danger"><strong>{{ $message }}</strong></div>
                                        @enderror
                                    </div>

                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-block">Agregar Alumno</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
