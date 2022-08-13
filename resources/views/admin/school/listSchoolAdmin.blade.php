@extends('layouts.mainAdmin')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet"
  href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection


@section('content')
<section class="section">
  <div class="section-body">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Listado Escuelas</h4>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Teléfono</th>
                    <th>provincia</th>
                    <th>localidad</th>
                    <th>Tipo</th>
                    <th>email</th>
                    <th>Sede</th>
                    <th>Donwload</th>
                    <th>Ingreso</th>
                    <th>Nivel</th>
                    <th>Acción</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($schools as $school)
                  <tr>
                    <td>{{ $school->name_school }}</td>
                    <td>{{ $school->phone_school }}</td>
                    <td>{{ $school->province->name }}</td>
                    <td>{{ $school->region->name }}</td>
                    <td>{{ $school->type }}</td>
                    <td>{{ $school->email_school }}</td>
                    <td>{{ $school->sede }}</td>
                    <form action="{{ route('admin.downloadEdit', $school) }}" method="POST">
                      <td>
                        @csrf
                        <select name="download" style="width : 50px">
                          <option value="{{ $school->download }}">{{ $school->download == 'Y' ? 'Si' : 'No' }}</option>
                          <option>------------</option>
                          <option value="N">No</option>
                          <option value="Y">Si</option>
                        </select>
                      </td>
                      <td>
                        <div class="buttons">
                          <select name="download_enter" style="width : 50px">
                            <option value="{{ $school->download_enter }}">{{ $school->download_enter == 1 ? 'Si' : 'No'
                              }}</option>
                            <option>------------</option>
                            <option value="1">Si</option>
                            <option value="0">No</option>
                          </select>
                        </div>
                      </td>
                      <td>
                        <select name="download_level" style="width : 50px">
                          <option value="{{ $school->download_level }}">{{ $school->download_level }}</option>
                          <option>------------</option>
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                        </select>
                      </td>
                      <td>
                        <div class="buttons">
                          <a href="{{ route('admin.schoolEdit', $school) }}" class="btn btn-sm btn-info">Editar</a>
                          <button type="submit" class="btn btn-sm btn-warning">Guardar</button>
                        </div>
                      </td>
                  </tr>
                  </form>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection

@section('js')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection