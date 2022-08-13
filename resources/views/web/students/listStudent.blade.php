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
                                        <th>Nivel</th>
                                        <th>Total Colegial</th>
                                        <th>Total Intercolegial</th>
                                        <th>Acción</th>
                                        <th>Subir Notas</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{ $student->name_student }}</td>
                                        <td>{{ $student->lastname_student }}</td>
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
                                        <td>
                                            {!! $student->total_note_inter == '' ? '<div class="badge badge-danger">Sin Nota
                                            </div>' : $student->total_note_inter !!}
                                            @if($student->level_student == 2)
                                                @if(!$student->second_note_inter AND $student->first_note_inter)
                                                  <div class="badge badge-warning">Falta Práctica</div>
                                                @endif
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                <a href="{{ route('student.edit', $student) }}" type="button"
                                                    class="btn btn-sm btn-success">Editar</a>
                                                <a href="{{ route('student.delete', $student) }}" type="button"
                                                    class="btn btn-sm btn-danger">Eliminar</a>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group mb-3" role="group" aria-label="Basic example">
                                                @if($registerNote->status_button == '1')
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#modalAddNoteStudent{{ $student->id }}">
                                                    Colegial</button>
                                                @endif
                                                @if($registerNoteInter->status_button == '1')
                                                <button type="button" class="btn btn-sm btn-warning" data-toggle="modal"
                                                    data-target="#modalAddNoteInterStudent{{ $student->id }}">
                                                    Inter-colegial</button>
                                                @endif
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
@include('web.students._agregarNotaInterModal')
@endforeach
@endsection

@section('js')
<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>
<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Page Specific JS File -->
<script src="{{ asset('assets/js/page/datatables.js') }}"></script>
@endsection