@extends('layouts.main')

<script type="text/javascript">
    function show1() {
        document.getElementById('div1').style.display = 'block';
    }

    function show2() {
        document.getElementById('div1').style.display = 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        @if(old('other_school')=='SI')
            show1();
        @elseif(old('other_school')=='NO')
            show2();
        @endif
    });
</script>

<style>
    .hide {
        display: none;
    }
</style>

@section('content')
    <section class="section">
        <div class="section-body">
            <div class="row">
                <div class="col-12 col-md-12 col-lg-12">
                    @include('alerts.error')
                    <div class="card">
                        <div class="card-header">
                            <h4>Agregar nuevo Profesor</h4>
                        </div>
                        <form action="{{ route('teacher.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Nombre</label>
                                        <input type="text" class="form-control @error('name_teacher') is-invalid @enderror" id="inputName" name="name_teacher"
                                            placeholder="Nombre" value="{{ old('name_teacher') }}" required>
                                        @error('name_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputLastName">Apellido</label>
                                        <input type="text" class="form-control @error('lastname_teacher') is-invalid @enderror" id="inputLastName"
                                            name="lastname_teacher" placeholder="Apellido" value="{{ old('lastname_teacher') }}" required>
                                        @error('lastname_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputPhone">Teléfono</label>
                                        <input type="text" class="form-control @error('phone_teacher') is-invalid @enderror" id="inputPhone" name="phone_teacher"
                                            placeholder="Teléfono" value="{{ old('phone_teacher') }}" required>
                                        @error('phone_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputDNI">DNI</label>
                                        <input type="text" class="form-control @error('dni_teacher') is-invalid @enderror" id="inputDNI" name="dni_teacher"
                                            placeholder="DNI" value="{{ old('dni_teacher') }}" required>
                                        @error('dni_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control @error('email_teacher') is-invalid @enderror" id="Email" name="email_teacher"
                                            placeholder="Email" value="{{ old('email_teacher') }}" required>
                                        @error('email_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputSpace">Espacio Curricular</label>
                                        <input type="text" class="form-control @error('space') is-invalid @enderror" id="inputSpace" name="space"
                                            placeholder="Espacio" value="{{ old('space') }}" required>
                                        @error('space')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-6">
                                        <label class="d-block">Nivel en el que participa</label>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="level_teacher" value="1"
                                                    class="selectgroup-input-radio" required {{ old('level_teacher')=='1'?'checked':'' }}>
                                                <span class="selectgroup-button">Nivel 1</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="level_teacher" value="2"
                                                    class="selectgroup-input-radio" {{ old('level_teacher')=='2'?'checked':'' }}>
                                                <span class="selectgroup-button">Nivel 2</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="level_teacher" value="3"
                                                    class="selectgroup-input-radio" {{ old('level_teacher')=='3'?'checked':'' }}>
                                                <span class="selectgroup-button">Ambos Niveles</span>
                                            </label>
                                        </div>
                                        @error('level_teacher')<div class="text-danger"><strong>{{ $message }}</strong></div>@enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label class="d-block">Participación con anterioridad</label>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="first_time_teacher" value="SI"
                                                    class="selectgroup-input-radio" required {{ old('first_time_teacher')=='SI'?'checked':'' }}>
                                                <span class="selectgroup-button">Participo por primera vez</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="first_time_teacher" value="NO"
                                                    class="selectgroup-input-radio" {{ old('first_time_teacher')=='NO'?'checked':'' }}>
                                                <span class="selectgroup-button">Ya he participado con anterioridad</span>
                                            </label>
                                        </div>
                                        @error('first_time_teacher')<div class="text-danger"><strong>{{ $message }}</strong></div>@enderror
                                    </div>


                                    <div class="form-group col-6">
                                        <label class="d-block">Participación en otras escuelas</label>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="other_school" value="SI"
                                                    class="selectgroup-input-radio" required onclick="show1();" {{ old('other_school')=='SI'?'checked':'' }}>
                                                <span class="selectgroup-button">Sí, participo en otro colegio</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <label class="selectgroup-item">
                                                <input type="radio" name="other_school" value="NO"
                                                    class="selectgroup-input-radio" onclick="show2();" {{ old('other_school')=='NO'?'checked':'' }}>
                                                <span class="selectgroup-button">No, solo en este colegio</span>
                                            </label>
                                        </div>
                                        @error('other_school')<div class="text-danger"><strong>{{ $message }}</strong></div>@enderror
                                    </div>

                                    <div id="div1" class="form-group col-6 {{ old('other_school')=='SI' ? '' : 'hide' }}">
                                        <label for="inputName">Nombre del colegio</label>
                                        <input type="text" class="form-control @error('name_school_teacher') is-invalid @enderror" id="inputName"
                                            name="name_school_teacher" placeholder="Nombre" value="{{ old('name_school_teacher') }}">
                                        @error('name_school_teacher')<span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>@enderror
                                    </div>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary btn-block">Agregar Profesor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
