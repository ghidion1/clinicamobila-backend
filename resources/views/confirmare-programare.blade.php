@component('mail::message')
# Programarea ta la Clinica Mobila

Salut, **{{ $programare->prenume }}**!

Programarea ta a fost înregistrată cu succes.

- **Specialitate:** {{ $programare->specialitate }}
- **Medic:** {{ $programare->medic }}
- **Data:** {{ $programare->data }} ora {{ $programare->ora }}
- **Telefon:** {{ $programare->telefon }}

Te vom contacta telefonic pentru confirmare. Mulțumim!

@component('mail::button', ['url' => 'https://clinicamobila.md'])
Vezi clinica noastră
@endcomponent

Cu respect,  
Clinica Mobila
@endcomponent
