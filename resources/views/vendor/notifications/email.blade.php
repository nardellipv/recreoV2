@component('mail::message')
# ¡Hola!

Recibimos una solicitud de restablecimiento de contraseña para tu cuenta.

@component('mail::button', ['url' => $actionUrl])
Restablecer contraseña
@endcomponent

Este enlace expirará en {{ config('auth.passwords.'.config('auth.defaults.passwords').'.expire') }} minutos.

Si no solicitaste este cambio, no es necesario realizar ninguna acción.

Saludos,<br>
{{ config('app.name') }}

@slot('subcopy')
Si tienes problemas para hacer clic en el botón "Restablecer contraseña", copia y pega la siguiente URL en tu navegador:<br>
[{{ $displayableActionUrl }}]({{ $actionUrl }})
@endslot
@endcomponent
