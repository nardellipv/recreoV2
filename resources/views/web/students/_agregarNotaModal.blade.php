<div class="modal fade" id="modalAddNoteStudent{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="modalAddNoteStudent{{ $student->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Nota a {{ $student->name_student }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('student.addNote', $student) }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nombre</label>
                        <div class="col-sm-9">
                            <p>{{ $student->name_student }}</p>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Apellido</label>
                        <div class="col-sm-9">
                            <p>{{ $student->lastname_student }}</p>
                        </div>
                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nivel</label>
                        <div class="col-sm-9">
                            <p>{{ $student->level_student }}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Primera Teórico <small>(de 0 a {{ $registerNote->first_note_max }}
                                puntos)</small></label>
                        <div class="col-sm-6">
                            <input type="number" name="first_note" class="form-control" id="inputEmail3" max="{{ $registerNote->first_note_max }}"
                                placeholder="Nota Teórico" value="{{ $student->first_note != 'NULL' ? $student->first_note : '' }}">
                        </div>
                    </div>
                    @if($student->level_student == 2)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Segunda Práctico <small>(de 0 a {{ $registerNote->second_note_max }}
                                puntos)</small></label>
                        <div class="col-sm-6">
                            <input type="number" name="second_note" class="form-control" id="inputEmail3" max="{{ $registerNote->second_note_max }}"
                                placeholder="Nota Práctico" value="{{ $student->second_note != 'NULL' ? $student->second_note : '' }}">
                        </div>
                    </div>
                    @endif
                </div>

                <div class="modal-footer bg-whitesmoke br">
                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </form>
        </div>
    </div>
</div>