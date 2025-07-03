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
       if ($validated['email']) {
    Mail::to($validated['email'])->send(new ConfirmareProgramare($programare));
}

        // Trimite email la client (dacă are email)
       // Pentru clinică:
Mail::to($validated['email'])->send(new ConfirmareProgramare($programare));

        return response()->json(['message' => 'Programare salvată și email trimis!'], 201);
    }
}
