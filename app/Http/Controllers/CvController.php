<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    public function create()
    {
        return view('cv.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string|max:255',
            'contact_info' => 'required|string',
            'education' => 'required|string',
            'work_experience' => 'required|string',
            'skills' => 'required|string',
            'languages' => 'required|string',
        ]);

        $cv = new Cv($request->all());
        $cv->user_id = auth()->id();
        $cv->save();

        return redirect()->route('cv.show', $cv);
    }

    public function show($id)
    {
        $cv = Cv::findOrFail($id); // Utiliza findOrFail para manejar errores si no se encuentra el CV
        return view('dashboard', compact('cv'));
    }

    /**
     * Genera y descarga el CV en formato PDF.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function generatePdf(Cv $cv)
    {
        // Verifica que el CV pertenece al usuario autenticado
        if ($cv->user_id !== auth()->id()) {
            abort(403, 'Acceso no autorizado');
        }

        // Carga la vista 'cv.pdf' pasando el CV y genera el PDF
        $pdf = Pdf::loadView('cv.pdf', compact('cv'));

        // Retorna el PDF para descarga con un nombre personalizado
        return $pdf->download('cv_' . Str::slug($cv->full_name) . '.pdf');
    }
}
