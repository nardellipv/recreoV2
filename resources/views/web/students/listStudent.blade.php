@extends('layouts.main')

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
                @include('alerts.error')
                <div class="card">
                    <div class="card-header">
                        <h4>Listado rápido de Alumnos</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-1">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>DNI</th>
                                        <th>Nivel</th>
                                        <th>Nota Total</th>
                                        <th>email</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name_student }}</td>
                                        <td>{{ $student->lastname_student }}</td>
                                        <td>{{ $student->dni_student }}</td>
                                        <td>{{ $student->level_student }}</td>
                                        <td>
                                            {!! $student->total_note == '' ? '<div class="badge badge-danger">Sin Nota
                                            </div>' : $student->total_note !!}
                                            @if($student->level_student == 2)
                                            @if(!$student->second_note AND $student->first_note)
                                            <div class="badge badge-warning">Falta Práctica</div>
                                            @endif
                                            @endif
                                        </td>
                                        <td>{{ $student->email_student }}</td>
                                        <td>
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                <a href="{{ route('student.edit', $student) }}" type="button"
                                                    class="btn btn-success">Editar</a>
                                                @if($registerNote->status_button == '1')
                                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                                    data-target="#modalAddNoteStudent{{ $student->id }}">Subir
                                                    Nota</button>
                                                @else
                                                <button type="button" class="btn btn-warning" disabled>Subir
                                                    Nota</button>
                                                @endif
                                                <a href="{{ route('student.delete', $student) }}" type="button"
                                                    class="btn btn-danger">Eliminar</a>
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
@foreach($students as $student)
@include('web.students._agregarNotaModal')
@endforeach
@endsection

@section('js')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection