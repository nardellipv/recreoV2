@extends('layouts.main')

@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12 col-md-12 col-lg-12">
        @include('alerts.error')
        <div class="card">
          <div class="card-header">
            <h4>Editar Alumno {{ $school->name }}</h4>
          </div>
          <form action="{{ route('school.update', $school) }}" method="POST">
            @csrf
            <div class="card-body">
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="inputName">Nombre</label>
                  <input type="text" class="form-control" id="inputName" name="name" placeholder="Nombre"
                    value="{{ old('name', $school->name) }}" required>
                </div>
                <div class="form-group col-md-6">
                  <label for="inputPhone">Teléfono</label>
                  <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Teléfono"
                    value="{{ old('phone', $school->phone) }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-12">
                  <label for="inputAddress">Dirección</label>
                  <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Dirección"
                    value="{{ old('phone', $school->address) }}" required>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-4">
                  <label for="inputPostalCode">Código Postal</label>
                  <input type="number" class="form-control" id="inputPostalCode" name="postal_code" placeholder="Código Postal"
                    value="{{ old('email', $school->postal_code) }}">
                </div>  

                <div class="form-group col-md-8">
                  <label for="inputEmail">Email</label>
                  <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Email"
                    value="{{ old('email', $school->email) }}">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="director1">Nombre Director</label>
                  <input type="text" class="form-control" id="director1" name="director1" placeholder="Nombre Director"
                    value="{{ old('email', $school->director1) }}">
                </div>  

                <div class="form-group col-md-6">
                  <label for="director2">Nombre Vice Director</label>
                  <input type="text" class="form-control" id="director2" name="director2" placeholder="Nombre Vice Director"
                    value="{{ old('email', $school->director2) }}">
                </div>
              </div>

              <div class="row">
                <div class="form-group col-3">
                  <label class="d-block">Tipo de Gestión</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="type" value="PRIVADA" class="selectgroup-input-radio"
                      {{ $school->type == 'PRIVADA' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Nivel 1</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="type" value="PUBLICA" class="selectgroup-input-radio"
                      {{ $school->type == 'PUBLICA' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Nivel 2</span>
                    </label>
                  </div>
                </div>

                <div class="form-group col-3">
                  <label class="d-block">¿Se postula como Sede?</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="sede" value="SI" class="selectgroup-input-radio"
                      {{ $school->sede == 'SI' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Primaria</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="sede" value="NO" class="selectgroup-input-radio"
                      {{ $school->sede == 'NO' ? 'checked' : ''}}>
                      <span class="selectgroup-button">Secundaria</span>
                    </label>
                  </div>
                </div>

                <div class="form-group col-6">
                  <label class="d-block">Participación con anterioridad</label>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="first_time" value="SI" class="selectgroup-input-radio"
                      {{ $school->first_time == 'SI' ? 'checked' : ''}} required>
                      <span class="selectgroup-button">Participo por primera vez</span>
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <label class="selectgroup-item">
                      <input type="radio" name="first_time" value="NO" class="selectgroup-input-radio"
                      {{ $school->first_time == 'NO' ? 'checked' : ''}}>
                      <span class="selectgroup-button">He participado anteriormente</span>
                    </label>
                  </div>
                </div>
              </div>
            </div>

            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-block">Editar
                Colegio</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection