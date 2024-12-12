<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function create()
    {
        return view('profileDos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            // Validaciones adicionales según sea necesario
        ]);

        $cv = new Cv();
        $cv->user_id = Auth::id();
        $cv->full_name = $validatedData['full_name'];
        $cv->address = $validatedData['address'];
        $cv->phone = $validatedData['phone'];
        $cv->email = $validatedData['email'];
        // Puedes agregar más campos si los has agregado en el formulario

        // Guarda el CV en la base de datos
        $cv->save();

        // Redirige a la vista que muestra el CV recién creado
        return redirect()->route('cv.show', $cv->id)->with('success', 'CV creado exitosamente.');
    }

    public function show(Cv $cv)
    {
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este CV.');
        }

        return view('cvs.show', compact('cv'));
    }

    public function downloadPdf(Cv $cv)
    {
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para descargar el PDF de este CV.');
        }

        $pdf = Pdf::loadView('cvs.pdf', compact('cv'));
        return $pdf->download('cv_' . Str::slug($cv->full_name) . '.pdf');
    }
}