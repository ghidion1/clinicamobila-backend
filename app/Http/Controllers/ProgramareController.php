<?php

namespace App\Http\Controllers;

use App\Models\Programare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ProgramareController extends Controller
{
    // Returnează lista de programări (toate)
    public function index()
    {
        return response()->json(Programare::orderBy('created_at', 'desc')->get());
    }

    // Salvează o nouă programare
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

        // Trimite email la clinica (admin)
        Mail::to('clinica@exemplu.md')
            ->send(new \App\Mail\ProgramareNoua($programare));

        // Trimite email la client (dacă are email)
        if ($validated['email']) {
            Mail::to($validated['email'])
                ->send(new \App\Mail\ConfirmareProgramare($programare));
        }

        return response()->json(['message' => 'Programare salvată și email trimis!'], 201);
    }
}
