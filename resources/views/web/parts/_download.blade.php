@if($downloadExam->status_button == 1 AND current_user()->download == 'Y')
<div class="row">
    <div class="col-12 col-md-12 col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h4>Área de descargas</h4>
            </div>
            <div class="card-body text-center">
                <p>Ingrese para descargar los PDF de las evaluaciones.</p>
                @if($school->download_enter == 0)
                <a href="{{ route('school.testDownload', $school) }}" class="btn btn-primary">Ingresar</a>
                <br>
                <br>
                <h5>Recuerde que va a poder ingresar y descargar 1 sola vez.</h5>
                @else
                <a href="#" class="btn disabled btn-primary">Ingresar</a>
                <br>
                <br>
                <h5>Usted ya ingreso anteriormente y no puede volver a ingresar.</h5>
                @endif                
            </div>
        </div>
    </div>
</div>
@endif