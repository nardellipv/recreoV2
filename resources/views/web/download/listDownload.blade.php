@extends('layouts.main')

@section('content')
<div class="card">
  <div class="card-body">
    <div class="jumbotron text-center">
      <h2>Listado de exámenes</h2>
      <p class="lead text-muted mt-3">Ya no podrá volver a ingresar nuevamente para descargar los exámenes</p>
    </div>
  </div>
</div>

@if(current_user()->download_level == 1 OR current_user()->download_level == 3)
<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Pruebas Nivel 1</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descargar</th>
              </tr>
              <tr>
                <td>1</td>
                <td>2023 - Nivel 1 - Prueba Provincial</td>
                <td><a href="{{ asset('download/nivel1/2023 - Nivel 1 - Prueba Intercolegial.pdf') }}" target="_Blank"
                    class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              @if($downloadCorrection->status_button == 1)
              <tr>
                <td>2</td>
                <td>2023 - Nivel 1 - Prueba Provincial - Clave de correción</td>
                <td><a href="{{ asset('download/nivel1/2023 - Nivel 1 - Prueba Intercolegial - Clave de correción.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Corrección</a></td>
              </tr>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@if(current_user()->download_level == 2 OR current_user()->download_level == 3)
<div class="section-body">
  <div class="row">
    <div class="col-12 col-md-12 col-lg-12">
      <div class="card">
        <div class="card-header">
          <h4>Pruebas Nivel 2</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-md">
              <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Descargar</th>
              </tr>
              <tr>
                <td>1</td>
                <td>2023 - Nivel 2 - 1. Experimental Alumnos Nivel 2</td>
                <td><a href="{{ asset('download/nivel2/1. Experimental Alumnos Nivel 2.pdf') }}" target="_Blank"
                    class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>2023 - Nivel 2 - 1. A. Provincial OM INSTRUCTIVO</td>
                <td><a href="{{ asset('download/nivel2/1. A. Intercolegial-OM-INSTRUCTIVO.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              <tr>
                <td>3</td>
                <td>2023 - Nivel 2 - 1. B. Provincial OM HOJA RESPUESTAS ALUMNOS</td>
                <td><a href="{{ asset('download/nivel2/1. B. Intercolegia-OM-HOJA-RESPUESTAS-ALUMNOS.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              <tr>
                <td>4</td>
                <td>2023 - Nivel 2 - 1. B. Resolución de Problemas</td>
                <td><a href="{{ asset('download/nivel2/1. RdeP Alumno.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              @if($downloadCorrection->status_button == 1)
              <tr>
                <td>1</td>
                <td>Provincial OM CC PROFESORES</td>
                <td><a href="{{ asset('download/nivel2/2. Intercolegial-OM-CC-PROFESORES.pdf') }}"
                  target="_Blank" class="btn btn-primary">Descargar Corrección</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>Prueba Resolución de Problemas</td>
                <td><a
                    href="{{ asset('download/nivel2/2.RdePClave de correcion.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Corrección</a></td>
              </tr>
              @endif
              @if($downloadCorrection2->status_button == 1)
              <tr>
                <td>1</td>
                <td>Experimental Clave Correccion</td>
                <td><a href="{{ asset('download/nivel2/2. Experimental-Clave Correccion.pdf') }}"
                  target="_Blank" class="btn btn-primary">Descargar Corrección</a></td>
              </tr>
              @endif
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endif

@endsection
