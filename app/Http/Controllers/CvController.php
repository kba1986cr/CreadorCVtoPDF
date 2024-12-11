<?php

namespace App\Http\Controllers;


use App\Models\Cv;
use Illuminate\Http\Request;
// use Barryvdh\DomPDF\Facade as PDF;
// use Barryvdh\DomPDF\Facade\Pdf as FacadePdf;
use Barryvdh\DomPDF\Facade\Pdf; // Asegúrate de usar la fachada correcta

class CvController extends Controller
{
    /**
     * Mostrar el formulario para crear un nuevo CV.
     */
    public function create()
    {
        return view('cv.create');
    }

    /**
     * Almacenar un CV recién creado en la base de datos.
     */
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
        $cv->user_id = auth()->id(); // Asegúrate de tener autenticación implementada
        $cv->save();

        return redirect()->route('cv.show', $cv);
    }

    /**
     * Mostrar el CV especificado.
     */
    public function show($id)
    {
        $cv = Cv::findOrFail($id); // Usa findOrFail para manejar CVs no encontrados
        return view('dashboard', compact('cv'));
    }

    /**
     * Generar y descargar el PDF del CV especificado.
     */
    public function generatePdf(Cv $cv)
    {
        $pdf = Pdf::loadView('cv.pdf', compact('cv'));
        return $pdf->download('cv_' . Str::slug($cv->full_name) . '.pdf');
    }
}