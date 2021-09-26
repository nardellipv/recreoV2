@section('css')
<link rel="stylesheet" href="assets/bundles/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
@endsection

<section class="section">
    <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Listado rápido de Profesores</h4>
                        <div class="card-header-action">
                            <a href="{{ route('teacher.add') }}" class="btn btn-warning">
                                Inscribir Nuevo Profesor
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped" id="table-2">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>email</th>
                                        <th>Espacio</th>
                                        <th>Nivel</th>
                                        <th>Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($teachers as $teacher)
                                    <tr>
                                        <td>{{ $teacher->name_teacher }}</td>
                                        <td>{{ $teacher->lastname_teacher }}</td>
                                        <td>{{ $teacher->email_teacher }}</td>
                                        <td>{{ $teacher->space }}</td>
                                        <td>{{ $teacher->level_teacher }}</td>
                                        <td>{{ $teacher->phone_teacher }}</td>
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

@section('js')
<script src="assets/bundles/datatables/datatables.min.js"></script>
<script src="assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
<!-- Page Specific JS File -->
<script src="assets/js/page/datatables.js"></script>
@endsection