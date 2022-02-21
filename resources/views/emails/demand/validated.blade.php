@component('mail::message')
# Votre demande de carte consulaire a été validée.

<b>Numero Dossier</b> : CC-{{ $demand->created_at->format('Ymd') }}{{ str_pad($demand->id, 5, '0', STR_PAD_LEFT) }}

Merci,<br />
{{ config('app.name') }}
@endcomponent
