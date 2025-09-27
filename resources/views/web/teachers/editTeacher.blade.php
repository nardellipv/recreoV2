@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        @include('alerts.error')
        <div class="card">
          <div class="card-header">
            <h4>Editar Profesor <b>{{ $teacher->name_teacher }}</b></h4>
          </div>
          <form action="{{ route('teacher.update', $teacher) }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text"
                         class="form-control @error('name_teacher') is-invalid @enderror"
                         id="inputName"
                         name="name_teacher"
                         placeholder="Nombre"
                         value="{{ old('name_teacher', $teacher->name_teacher) }}"
                         required>
                  @error('name_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputLastName">Apellido</label>
                  <input type="text"
                         class="form-control @error('lastname_teacher') is-invalid @enderror"
                         id="inputLastName"
                         name="lastname_teacher"
                         placeholder="Apellido"
                         value="{{ old('lastname_teacher', $teacher->lastname_teacher) }}"
                         required>
                  @error('lastname_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputPhone">Teléfono</label>
                  <input type="text"
                         class="form-control @error('phone_teacher') is-invalid @enderror"
                         id="inputPhone"
                         name="phone_teacher"
                         placeholder="Teléfono"
                         value="{{ old('phone_teacher', $teacher->phone_teacher) }}"
                         required>
                  @error('phone_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputDNI">DNI</label>
                  <input type="text"
                         class="form-control @error('dni_teacher') is-invalid @enderror"
                         id="inputDNI"
                         name="dni_teacher"
                         placeholder="DNI"
                         value="{{ old('dni_teacher', $teacher->dni_teacher) }}"
                         required>
                  @error('dni_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputEmail">Email</label>
                  <input type="email"
                         class="form-control @error('email_teacher') is-invalid @enderror"
                         id="inputEmail"
                         name="email_teacher"
                         placeholder="Email"
                         value="{{ old('email_teacher', $teacher->email_teacher) }}"
                         required>
                  @error('email_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
                <div class="form-group col-md-6">
                  <label for="inputSpace">Espacio Curricular</label>
                  <input type="text"
                         class="form-control @error('space') is-invalid @enderror"
                         id="inputSpace"
                         name="space"
                         placeholder="Espacio"
                         value="{{ old('space', $teacher->space) }}"
                         required>
                  @error('space')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>

              <div class="row">
                <div class="form-group col-6">
                  <label class="d-block">Nivel en el que participa</label>
                  @foreach(['1'=>'Nivel 1','2'=>'Nivel 2','3'=>'Ambos Niveles'] as $val=>$label)
                    <label class="selectgroup-item form-check form-check-inline">
                      <input type="radio"
                             name="level_teacher"
                             value="{{ $val }}"
                             class="selectgroup-input-radio"
                             required
                             {{ old('level_teacher', $teacher->level_teacher) == $val ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ $label }}</span>
                    </label>
                  @endforeach
                  @error('level_teacher')
                    <div class="text-danger"><strong>{{ $message }}</strong></div>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label class="d-block">Participación con anterioridad</label>
                  @foreach(['SI'=>'Participó por primera vez','NO'=>'Ya he participado con anterioridad'] as $val=>$label)
                    <label class="selectgroup-item form-check form-check-inline">
                      <input type="radio"
                             name="first_time_teacher"
                             value="{{ $val }}"
                             class="selectgroup-input-radio"
                             required
                             {{ old('first_time_teacher', $teacher->first_time_teacher) == $val ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ $label }}</span>
                    </label>
                  @endforeach
                  @error('first_time_teacher')
                    <div class="text-danger"><strong>{{ $message }}</strong></div>
                  @enderror
                </div>

                <div class="form-group col-6">
                  <label class="d-block">Participación en otras escuelas</label>
                  @foreach(['SI'=>'Sí, participo en otro colegio','NO'=>'No, solo en este colegio'] as $val=>$label)
                    <label class="selectgroup-item form-check form-check-inline">
                      <input type="radio"
                             name="other_school"
                             value="{{ $val }}"
                             class="selectgroup-input-radio"
                             required
                             onclick="show1();"
                             {{ old('other_school', $teacher->other_school) == $val ? 'checked' : '' }}>
                      <span class="selectgroup-button">{{ $label }}</span>
                    </label>
                  @endforeach
                  @error('other_school')
                    <div class="text-danger"><strong>{{ $message }}</strong></div>
                  @enderror
                </div>

                <div id="div1"
                     class="form-group col-6 {{ old('other_school', $teacher->other_school) == 'SI' ? '' : 'hide' }}">
                  <label for="inputNameSchool">Nombre del colegio</label>
                  <input type="text"
                         class="form-control @error('name_school_teacher') is-invalid @enderror"
                         id="inputNameSchool"
                         name="name_school_teacher"
                         placeholder="Nombre del colegio"
                         value="{{ old('name_school_teacher', $teacher->name_school_teacher) }}">
                  @error('name_school_teacher')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                  @enderror
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-block">Actualizar Profesor</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@push('scripts')
<script>
  function show1() {
    document.getElementById('div1').style.display = 'block';
  }
  function show2() {
    document.getElementById('div1').style.display = 'none';
  }
  document.addEventListener('DOMContentLoaded', function() {
    if ('{{ old('other_school', $teacher->other_school) }}' === 'SI') {
      show1();
    } else {
      show2();
    }
  });
</script>
@endpush

@push('styles')
<style>
  .hide {
    display: none;
  }
</style>
@endpush
