@extends('layouts.mainAdmin')

@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        @include('alerts.error')
        <div class="card">
          <div class="card-header">
            <h4>Editar Alumno {{ $student->name }}</h4>
          </div>
          <form action="{{ route('admin.studentUpdate', $student) }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" class="form-control" id="inputName" name="name_student" placeholder="Nombre"
                    value="{{ old('name', $student->name_student) }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLastName">Apellido</label>
                  <input type="text" class="form-control" id="inputLastName" name="lastname_student" placeholder="Apellido"
                    value="{{ old('lastname', $student->lastname_student) }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPhone">Teléfono</label>
                  <input type="text" class="form-control" id="inputPhone" name="phone_student" placeholder="Teléfono"
                    value="{{ old('phone_student', $student->phone_student) }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDNI">DNI</label>
                  <input type="text" class="form-control" id="inputDNI" name="dni_student" placeholder="DNI"
                    value="{{ old('dni', $student->dni_student) }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPhone">Teléfono</label>
                  <label>Fecha Nacimiento</label>
                  <input type="date" name="birth_date" class="form-control" value="{{ old('birth_date', $student->birth_date) }}" required>
                </div>

                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email_student" placeholder="Email"
                    value="{{ old('email_student', $student->email_student) }}">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label class="d-block">Nivel en el que participa</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="level_student" value="1" class="selectgroup-input-radio"
                      {{ $student->level_student == '1' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Nivel 1</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="level_student" value="2" class="selectgroup-input-radio"
                      {{ $student->level_student == '2' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Nivel 2</span>
                    </label>
                  </div>
                </div>

                <div class="form-group col-6">
                  <label class="d-block">Nivel de estudio</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="classroom" value="PRIMARIA" class="selectgroup-input-radio"
                      {{ $student->classroom == 'PRIMARIA' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Primaria</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="classroom" value="SECUNDARIA" class="selectgroup-input-radio"
                      {{ $student->classroom == 'SECUNDARIA' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Secundaria</span>
                    </label>
                  </div>
                </div>

                <div class="form-group col-6">
                  <label class="d-block">Participación con anterioridad</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="first_time_student" value="SI" class="selectgroup-input-radio"
                      {{ $student->first_time_student == 'SI' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Participo por primera vez</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="first_time_student" value="NO" class="selectgroup-input-radio"
                      {{ $student->first_time_student == 'NO' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Ya he participado con anterioridad</span>
                    </label>
                  </div>
                </div>


                <div class="form-group col-6">
                  <label class="d-block">Genero</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="genre" value="MASCULINO" class="selectgroup-input-radio"
                      {{ $student->genre == 'MASCULINO' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Masculino</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="genre" value="FEMENINO" class="selectgroup-input-radio"
                      {{ $student->genre == 'FEMENINO' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Femenino</span>
                    </label>
                  </div>
                </div>

              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-block">Editar
                Alumno</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection