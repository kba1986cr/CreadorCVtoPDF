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

    public function generatePdf(Cv $cv)
    {
        $pdf = Pdf::loadView('cv.pdf', compact('cv'));
        return $pdf->download('cv_' . $cv->full_name . '.pdf');
    }

    public function downloadPdf(Request $request, CV $cv)
    {
        $template = $request->get('template', 'template1'); // Plantilla por defecto

        // Validar que la plantilla exista
        if (!in_array($template, ['template1', 'template2'])) {
            $template = 'template1';
        }

        $pdf = PDF::loadView("cv_templates.{$template}", compact('cv'));

        return $pdf->download("CV_{$cv->full_name}_{$template}.pdf");
    }
}
