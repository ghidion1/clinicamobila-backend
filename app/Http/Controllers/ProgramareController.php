<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ProgramareNoua;
use App\Mail\ConfirmareProgramare;

class ProgramareController extends Controller
{
    // Returnează lista de programări (toate)
  
public function lista()
{
    $programari = \App\Models\Programare::orderBy('data', 'desc')->get();
    return view('admin.programari', compact('programari'));
}

  public function store(Request $request)
{
    $validated = $request->validate([
        'nume' => 'required|string|max:64',
        'prenume' => 'required|string|max:64',
        'specialitate' => 'required|string',
        'medic' => 'required|string',
        'data' => 'required|date',
        'ora' => 'required|string',
        'telefon' => 'required|string',
        'email' => 'nullable|email',
        'motiv' => 'nullable|string',
        'mesaj' => 'nullable|string',
    ]);

    $programare = \App\Models\Programare::create($validated);

    // EMAIL SIMPLU CĂTRE CLINICĂ
    Mail::raw(
        "A fost făcută o programare:\n" .
        "Nume: {$programare->nume}\nPrenume: {$programare->prenume}\nSpecialitate: {$programare->specialitate}\nMedic: {$programare->medic}\nData: {$programare->data} Ora: {$programare->ora}\nTelefon: {$programare->telefon}\nEmail: {$programare->email}\nMotiv: {$programare->motiv}\nMesaj: {$programare->mesaj}",
        function($m) {
            $m->to('ghidion.adrian@elev.cihcahul.md')
              ->subject('Nouă programare');
        }
    );

    // EMAIL SIMPLU CĂTRE CLIENT
    if ($programare->email) {
        Mail::raw(
            "Salut, programarea ta a fost înregistrată cu succes la Clinica Mobila!\n\nDetalii programare:\nSpecialitate: {$programare->specialitate}\nMedic: {$programare->medic}\nData: {$programare->data} Ora: {$programare->ora}",
            function($m) use ($programare) {
                $m->to($programare->email)
                  ->subject('Confirmare programare');
            }
        );
    }

    return response()->json(['message' => 'Programare salvată și email trimis!'], 201);
}
}
