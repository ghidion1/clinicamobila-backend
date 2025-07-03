@component('mail::message')
# Confirmare programare

Salut, {{ $programare->prenume }}!

Programarea ta a fost înregistrată cu succes:

- Nume: {{ $programare->nume }} {{ $programare->prenume }}
- Specialitate: {{ $programare->specialitate }}
- Medic: {{ $programare->medic }}
- Data: {{ $programare->data }} ora {{ $programare->ora }}
- Telefon: {{ $programare->telefon }}

@component('mail::button', ['url' => 'https://clinicamobila.md'])
Vezi clinica noastră
@endcomponent

Mulțumim,
Clinica Mobila
@endcomponent
