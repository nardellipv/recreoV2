@if (count($errors) > 0)
<div class="alert alert-danger alert-has-icon">
    <div class="alert-icon"></div>
    <div class="alert-body">
        <div class="alert-title">Por favor revisar los siguientes errores</div>
        @foreach ($errors->all() as $error)
        <li class="text-custom-white"> {{ $error }}</li>
        @endforeach
    </div>
</div>
@endif