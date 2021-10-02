<section class="section">
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Simple</h4>
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Estado</th>
                            <th>Nota Teórico Max</th>
                            <th>Nota Práctico Max</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statusButton as $status)
                        <form action="{{ route('admin.editStatus', $status) }}" method="POST">
                            @csrf
                        <tr>
                            <td>{{ $status->name_button }}</td>
                            <td><input name="status_button" value="{{ $status->status_button }}"></td>
                            <td><input name="first_note_max" value="{{ $status->first_note_max }}"></td>
                            <td><input name="second_note_max" value="{{ $status->second_note_max }}"></td>
                            <td><button type="submit" class="btn btn-warning">Actualizar</button></td>
                        </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>