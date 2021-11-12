@component('mail::message')
# Votre demande a été rejetée

Votre demande du '{{ $demand->created_at->format('d/m/Y') }}'
pour le document '{{ $demand->document->title }}' pour la raison suivante:

{{ $demand->rejection->justification }}

Merci,<br />
{{ config('app.name') }}
@endcomponent
