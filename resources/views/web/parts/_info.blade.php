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
                        <input type="text" class="form-control" id="inputName" value="{{ old('name_school', $school->name_school) }}"
                            readonly>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputPhone">Teléfono</label>
                        <input type="text" class="form-control" value="{{ old('phone_school', $school->phone_school) }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="inputAddress">Dirección</label>
                        <input type="text" class="form-control" value="{{ old('address', $school->address) }}" readonly>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputPostalCode">Código Postal</label>
                        <input type="number" class="form-control" readonly
                            value="{{ old('postal_code', $school->postal_code) }}">
                    </div>

                    <div class="form-group col-md-8">
                        <label for="inputEmail">Email</label>
                        <input type="email" class="form-control" readonly value="{{ old('email_school', $school->email_school) }}">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="director1">Nombre Director</label>
                        <input type="text" class="form-control" readonly value="{{ old('director1', $school->director1) }}">
                    </div>

                    <div class="form-group col-md-6">
                        <label for="director2">Nombre Vice Director</label>
                        <input type="text" class="form-control" readonly value="{{ old('director2', $school->director2) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-3">
                        <label class="d-block">Tipo de Gestión</label>
                        <p>{{ $school->type }}</p>
                    </div>

                    <div class="form-group col-3">
                        <label class="d-block">¿Se postula como Sede?</label>
                        <p>{{ $school->sede }}</p>
                    </div>

                    <div class="form-group col-6">
                        <label class="d-block">¿Participa por primera vez?</label>
                        {{ $school->first_time_school }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>