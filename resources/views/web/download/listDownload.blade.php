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
                <td>2025 - Nivel 1 - Prueba Provincial</td>
                <td><a href="{{ asset('download/nivel1/25-9 9hs/Examen Provincial N1 2025 SIN Respuestas.pdf') }}" target="_Blank"
                    class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              @if($downloadCorrection->status_button == 1)
              <tr>
                <td>2</td>
                <td>2025 - Nivel 1 - Prueba Provincial - Clave de correción</td>
                <td><a href="{{ asset('download/nivel1/26-9 12hs/Examen Provincial N1 2025 - Clave de corrección.pdf') }}"
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
                <td>2025 - Nivel 2 - 1. Prueba teórica Provincial</td>
                <td><a href="{{ asset('download/nivel2/25-9 9hs/Nivel 2 - Teórica Provincial 2025 sin respuestas.pdf') }}" target="_Blank"
                    class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              <tr>
                <td>2</td>
                <td>2025 - Nivel 2 - 2. Prueba Experimental Provincial N2</td>
                <td><a href="{{ asset('download/nivel2/25-9 9hs/Nivel 2 Experimental 2025 sin respuestas.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>
              @if($downloadCorrection2->status_button == 1)
              <tr>
                <td>3</td>
                <td>2025 - Nivel 2 - 1. Clave de correccion Prueba Teórica Provincial</td>
                <td><a href="{{ asset('download/nivel2/26-9 15hs/Clave de correción Nivel 2 - Teórica Provincial 2025.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Corrección</a></td>
              </tr>
              @endif
             <!-- <tr>
                <td>4</td>
                <td>2025 - Nivel 2 - 2. Prueba Experimental Provincial</td>
                <td><a href="{{ asset('download/nivel2/2. ClaveCorrección- PRUEBA EXPERIMENTAL PROVINCIAL 2024.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>

              <tr>
                <td>4</td>
                <td>2025 - Nivel 2 - 2.B. Clave Corrección- PRUEBA EXPERIMENTAL PROVINCIAL 2024</td>
                <td><a href="{{ asset('download/nivel2/2.B. Clave Corrección- PRUEBA EXPERIMENTAL PROVINCIAL 2024 CON RESPUESTAS.pdf') }}"
                    target="_Blank" class="btn btn-primary">Descargar Prueba</a></td>
              </tr>-->
              <!-- ------------------------------------------------------------------- -->
              <!-- @if($downloadCorrection->status_button == 1)
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
              @endif-->
              @if($downloadCorrection2->status_button == 1)
              <tr>
                <td>4</td>
                <td>2025 - Experimental Clave Correccion</td>
                <td><a href="{{ asset('download/nivel2/26-9 12hs/Clave de correciones Nivel 2 Experimental 2025.pdf') }}"
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
