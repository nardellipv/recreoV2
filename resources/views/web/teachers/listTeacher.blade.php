@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/datatables.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
@endsection

@section('content')
<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Listado rápido de Profesores</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DNI</th>
                                        <th>Espacio Curricular</th>
                                        <th>Nivel</th>
                                        <th>Teléfono</th>
                                        <th>email</th>
                                        <th>Primera vez</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name_teacher }}</td>
                                        <td>{{ $teacher->lastname_teacher }}</td>
                                        <td>{{ $teacher->dni_teacher }}</td>
                                        <td>{{ $teacher->space }}</td>
                                        @if($teacher->level_teacher != '3')
                                        <td>{{ $teacher->level_teacher }}</td>
                                        @else
                                        <td>1 y 2</td>
                                        @endif
                                        <td>{{ $teacher->phone_teacher }}</td>
                                        <td>{{ $teacher->email_teacher }}</td>
                                        <td>{{ $teacher->first_time_teacher }}</td>
                                        <td>
                                            <div class="buttons">
                                                <a href="{{ route('teacher.edit', $teacher) }}"
                                                    class="btn btn-sm btn-info">Editar</a>
                                                <a href="{{ route('teacher.delete', $teacher) }}" class="btn btn-sm btn-danger">Eliminar</a>
                                            </div>
                                        </td>
                                    </tr>
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
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection