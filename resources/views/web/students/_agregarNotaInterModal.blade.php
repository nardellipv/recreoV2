<div class="modal fade" id="modalAddNoteInterStudent{{ $student->id }}" tabindex="-1" role="dialog" aria-labelledby="modalAddNoteInterStudent{{ $student->id }}"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Agregar Nota Intercolegial a {{ $student->name_student }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('student.addInterNote', $student) }}">
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

                    @if($student->level_student == 1)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Prueba Teórico-Experimental <small>(de
                            0 a 100 puntos)</small></label>
                        <div class="col-sm-6">
                            <input type="number" name="first_note_inter" class="form-control" id="inputEmail3" max="100"
                                placeholder="Teórico-Experimental" value="{{ $student->first_note_inter != 'NULL' ? $student->first_note_inter : '' }}">
                        </div>
                    </div>
                    @endif

                    @if($student->level_student == 2)
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Prueba Teórico-Práctica <small>(de
                            0 a 60 puntos)</small></label>
                        <div class="col-sm-6">
                            <input type="number" name="first_note_inter" class="form-control" id="inputEmail3" max="60"
                                placeholder="Teórico-Práctica " value="{{ $student->first_note_inter != 'NULL' ? $student->first_note_inter : '' }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-6 col-form-label">Prueba Experimental <small>(de 0 a 40
                            puntos)</small></label>
                        <div class="col-sm-6">
                            <input type="number" name="second_note_inter" class="form-control" id="inputEmail3" max="40"
                                placeholder="Experimental" value="{{ $student->second_note_inter != 'NULL' ? $student->second_note_inter : '' }}">
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