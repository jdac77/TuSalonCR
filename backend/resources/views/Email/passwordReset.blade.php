@component('mail::message')
# Change password Request

Presione el boton para cambiar la contraseña

@component('mail::button', ['url' => 'http://localhost:4200/response-password-reset?token='.$token])
Cambiar contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
