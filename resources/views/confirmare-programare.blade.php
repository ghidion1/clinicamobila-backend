{{-- resources/views/emails/confirmare-programare.blade.php --}}
@component('mail::message')
# Programarea ta la Clinica Mobila

Salut, **{{ $programare->prenume }}**!

Programarea ta a fost înregistrată cu succes.

- **Specialitate:** {{ $programare->specialitate }}
- **Medic:** {{ $programare->medic }}
- **Data:** {{ $programare->data }} ora {{ $programare->ora }}
- **Telefon:** {{ $programare->telefon }}

Te vom contacta telefonic pentru confirmare. Mulțumim!

@component('mail::button', ['url' => 'https://emanuel-cioburciu.md'])
Vezi clinica noastră
@endcomponent

Cu respect,  
Clinica Mobila
@endcomponent
