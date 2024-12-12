<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Str;

class CvController extends Controller
{
    /**
     * Muestra un CV específico.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\View\View
     */
    public function show(Cv $cv)
    {
        return view('dashboard', compact('cv'));
    }

    /**
     * Almacena un nuevo CV en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'full_name'       => 'required|string|max:255',
            'contact_info'    => 'required|string',
            'education'       => 'required|string',
            'work_experience' => 'required|string',
            'skills'          => 'required|string',
            'languages'       => 'required|string',
        ]);

        $cv = new Cv($request->all());
        $cv->user_id = auth()->id();
        $cv->save();

        return redirect()->route('cv.show', $cv)->with('success', 'CV creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un CV existente.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\View\View
     */
    public function edit(Cv $cv)
    {
        return view('cv.edit', compact('cv'));
    }

    /**
     * Actualiza un CV existente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Cv $cv)
    {
        $request->validate([
            'full_name'       => 'required|string|max:255',
            'contact_info'    => 'required|string',
            'education'       => 'required|string',
            'work_experience' => 'required|string',
            'skills'          => 'required|string',
            'languages'       => 'required|string',
        ]);

        $cv->update($request->all());

        return redirect()->route('cv.show', $cv)->with('success', 'CV actualizado exitosamente.');
    }

    /**
     * Elimina un CV de la base de datos.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cv $cv)
    {
        $cv->delete();

        return redirect()->route('dashboard')->with('success', 'CV eliminado exitosamente.');
    }

    /**
     * Genera y descarga el PDF del CV.
     *
     * @param  \App\Models\Cv  $cv
     * @return \Illuminate\Http\Response
     */
    public function downloadPdf(Cv $cv)
    {
        $pdf = Pdf::loadView('cv.pdf', compact('cv'));

        return $pdf->download('CV_' . Str::slug($cv->full_name) . '.pdf');
    }
}
