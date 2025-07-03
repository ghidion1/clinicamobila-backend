<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProgramareController extends Controller
{
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

        $programare = Programare::create($validated);

        // Trimite email la clinica
        Mail::raw("A fost făcută o programare:\n\n" . print_r($validated, true), function($m) {
            $m->to('clinica@exemplu.md')->subject('Nouă programare');
        });

        // Trimite email la client, dacă are email
        if (!empty($validated['email'])) {
            Mail::raw("Salut, programarea ta a fost înregistrată cu succes!", function($m) use ($validated) {
                $m->to($validated['email'])->subject('Confirmare programare');
            });
        }

        return response()->json(['message' => 'Programare salvată și email trimis!'], 201);
    }
}
