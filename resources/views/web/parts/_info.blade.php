<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Datos del colegio</h4>
            </div>
            <div class="card-body">
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName" value="{{ old('name', $school->name) }}"
                            readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Teléfono</label>
                        <input type="text" class="form-control" value="{{ old('phone', $school->phone) }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress">Dirección</label>
                        <input type="text" class="form-control" value="{{ old('phone', $school->address) }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPostalCode">Código Postal</label>
                        <input type="number" class="form-control" readonly
                            value="{{ old('email', $school->postal_code) }}">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" readonly value="{{ old('email', $school->email) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="director1">Nombre Director</label>
                        <input type="text" class="form-control" readonly value="{{ old('email', $school->director1) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="director2">Nombre Vice Director</label>
                        <input type="text" class="form-control" readonly value="{{ old('email', $school->director2) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label class="d-block">Tipo de Gestión</label>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="type" class="selectgroup-input-radio"
                                    {{ $school->type == 'PRIVADA' ? 'checked' : ''}} disabled>
                                <span class="selectgroup-button">Nivel 1</span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="type" class="selectgroup-input-radio"
                                    {{ $school->type == 'PUBLICA' ? 'checked' : ''}} disabled>
                                <span class="selectgroup-button">Nivel 2</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-3">
                        <label class="d-block">¿Se postula como Sede?</label>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="sede" disabled class="selectgroup-input-radio"
                                    {{ $school->sede == 'SI' ? 'checked' : ''}} readonly>
                                <span class="selectgroup-button">Primaria</span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="sede" disabled class="selectgroup-input-radio"
                                    {{ $school->sede == 'NO' ? 'checked' : ''}}>
                                <span class="selectgroup-button">Secundaria</span>
                            </label>
                        </div>
                    </div>

                    <div class="form-group col-6">
                        <label class="d-block">Participación con anterioridad</label>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="first_time" disabled class="selectgroup-input-radio"
                                    {{ $school->first_time == 'SI' ? 'checked' : ''}} readonly>
                                <span class="selectgroup-button">Participo por primera vez</span>
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <label class="selectgroup-item">
                                <input type="radio" name="first_time" disabled class="selectgroup-input-radio"
                                    {{ $school->first_time == 'NO' ? 'checked' : ''}}>
                                <span class="selectgroup-button">He participado anteriormente</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>