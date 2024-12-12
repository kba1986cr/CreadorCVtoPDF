<?php

namespace App\Http\Controllers;

use App\Models\Cv;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Barryvdh\DomPDF\Facade\Pdf;

class CvController extends Controller
{
    /**
     * Muestra el formulario para crear un nuevo CV.
     */
    public function create()
    {
        return view('profileDos.create');
    }

    /**
     * Almacena un nuevo CV en la base de datos.
     */
    public function store(Request $request)
    {
        // Validar los datos de entrada
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'objective' => 'nullable|string',
            'profile' => 'nullable|string',
            'work_experience' => 'required|array',
            'work_experience.*.company' => 'required|string|max:255',
            'work_experience.*.position' => 'required|string|max:255',
            'work_experience.*.start_date' => 'required|date',
            'work_experience.*.end_date' => 'nullable|date|after_or_equal:work_experience.*.start_date',
            'work_experience.*.responsibilities' => 'nullable|string',
            'education' => 'required|array',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.start_date' => 'nullable|date',
            'education.*.end_date' => 'nullable|date|after_or_equal:education.*.start_date',
            'education.*.notes' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string|max:100',
            'languages' => 'nullable|array',
            'languages.*.language' => 'nullable|string|max:100',
            'languages.*.proficiency' => 'nullable|string|max:50',
            'certifications' => 'nullable|array',
            'certifications.*.name' => 'nullable|string|max:255',
            'certifications.*.institution' => 'nullable|string|max:255',
            'certifications.*.year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'projects' => 'nullable|array',
            'projects.*.name' => 'nullable|string|max:255',
            'projects.*.description' => 'nullable|string',
            'projects.*.results' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*.type' => 'nullable|string|max:50',
            'achievements.*.details' => 'nullable|string|max:255',
            'references' => 'nullable|array',
            'references.*.name' => 'nullable|string|max:255',
            'references.*.position' => 'nullable|string|max:255',
            'references.*.contact' => 'nullable|string|max:255',
            'additional_info.volunteer_experience' => 'nullable|string',
            'additional_info.professional_affiliations' => 'nullable|string',
            'additional_info.personal_interests' => 'nullable|string',
        ]);

        // Crear una nueva instancia de Cv con los datos validados
        $cv = new Cv();
        $cv->user_id = Auth::id();
        $cv->full_name = $validatedData['full_name'];
        $cv->address = $validatedData['address'] ?? null;
        $cv->phone = $validatedData['phone'] ?? null;
        $cv->email = $validatedData['email'];
        $cv->linkedin = $validatedData['linkedin'] ?? null;
        $cv->portfolio = $validatedData['portfolio'] ?? null;
        $cv->objective = $validatedData['objective'] ?? null;
        $cv->profile = $validatedData['profile'] ?? null;
        $cv->work_experience = $validatedData['work_experience'];
        $cv->education = $validatedData['education'];
        $cv->skills = $validatedData['skills'] ?? [];
        $cv->languages = $validatedData['languages'] ?? [];
        $cv->certifications = $validatedData['certifications'] ?? [];
        $cv->projects = $validatedData['projects'] ?? [];
        $cv->achievements = $validatedData['achievements'] ?? [];
        $cv->references = $validatedData['references'] ?? [];
        $cv->additional_info = $validatedData['additional_info'] ?? [];
        $cv->save();

        return redirect()->route('cvs.show', $cv)->with('success', 'CV creado exitosamente.');
    }

    /**
     * Muestra un CV específico.
     */
    public function show(Cv $cv)
    {
        // Verificar que el usuario autenticado sea el dueño del CV o tenga permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este CV.');
        }

        return view('cvs.show', compact('cv'));
    }

    /**
     * Muestra el formulario para editar un CV existente.
     */
    public function edit(Cv $cv)
    {
        // Verificar que el usuario autenticado sea el dueño del CV o tenga permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este CV.');
        }

        return view('cvs.edit', compact('cv'));
    }

    /**
     * Actualiza un CV existente en la base de datos.
     */
    public function update(Request $request, Cv $cv)
    {
        // Verificar que el usuario autenticado sea el dueño del CV o tenga permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para actualizar este CV.');
        }

        // Validar los datos de entrada
        $validatedData = $request->validate([
            'full_name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'linkedin' => 'nullable|url|max:255',
            'portfolio' => 'nullable|url|max:255',
            'objective' => 'nullable|string',
            'profile' => 'nullable|string',
            'work_experience' => 'required|array',
            'work_experience.*.company' => 'required|string|max:255',
            'work_experience.*.position' => 'required|string|max:255',
            'work_experience.*.start_date' => 'required|date',
            'work_experience.*.end_date' => 'nullable|date|after_or_equal:work_experience.*.start_date',
            'work_experience.*.responsibilities' => 'nullable|string',
            'education' => 'required|array',
            'education.*.institution' => 'required|string|max:255',
            'education.*.degree' => 'required|string|max:255',
            'education.*.start_date' => 'nullable|date',
            'education.*.end_date' => 'nullable|date|after_or_equal:education.*.start_date',
            'education.*.notes' => 'nullable|string',
            'skills' => 'nullable|array',
            'skills.*' => 'nullable|string|max:100',
            'languages' => 'nullable|array',
            'languages.*.language' => 'nullable|string|max:100',
            'languages.*.proficiency' => 'nullable|string|max:50',
            'certifications' => 'nullable|array',
            'certifications.*.name' => 'nullable|string|max:255',
            'certifications.*.institution' => 'nullable|string|max:255',
            'certifications.*.year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'projects' => 'nullable|array',
            'projects.*.name' => 'nullable|string|max:255',
            'projects.*.description' => 'nullable|string',
            'projects.*.results' => 'nullable|string',
            'achievements' => 'nullable|array',
            'achievements.*.type' => 'nullable|string|max:50',
            'achievements.*.details' => 'nullable|string|max:255',
            'references' => 'nullable|array',
            'references.*.name' => 'nullable|string|max:255',
            'references.*.position' => 'nullable|string|max:255',
            'references.*.contact' => 'nullable|string|max:255',
            'additional_info.volunteer_experience' => 'nullable|string',
            'additional_info.professional_affiliations' => 'nullable|string',
            'additional_info.personal_interests' => 'nullable|string',
        ]);

        // Actualizar los datos del CV
        $cv->update([
            'full_name' => $validatedData['full_name'],
            'address' => $validatedData['address'] ?? null,
            'phone' => $validatedData['phone'] ?? null,
            'email' => $validatedData['email'],
            'linkedin' => $validatedData['linkedin'] ?? null,
            'portfolio' => $validatedData['portfolio'] ?? null,
            'objective' => $validatedData['objective'] ?? null,
            'profile' => $validatedData['profile'] ?? null,
            'work_experience' => $validatedData['work_experience'],
            'education' => $validatedData['education'],
            'skills' => $validatedData['skills'] ?? [],
            'languages' => $validatedData['languages'] ?? [],
            'certifications' => $validatedData['certifications'] ?? [],
            'projects' => $validatedData['projects'] ?? [],
            'achievements' => $validatedData['achievements'] ?? [],
            'references' => $validatedData['references'] ?? [],
            'additional_info' => $validatedData['additional_info'] ?? [],
        ]);

        return redirect()->route('cvs.show', $cv)->with('success', 'CV actualizado exitosamente.');
    }

    /**
     * Elimina un CV de la base de datos.
     */
    public function destroy(Cv $cv)
    {
        // Verificar que el usuario autenticado sea el dueño del CV o tenga permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para eliminar este CV.');
        }

        $cv->delete();

        return redirect()->route('cvs.index')->with('success', 'CV eliminado exitosamente.');
    }

    /**
     * Muestra una lista de los CVs del usuario.
     */
    public function index()
    {
        $cvs = Cv::where('user_id', Auth::id())->latest()->paginate(10);
        return view('cvs.index', compact('cvs'));
    }

    /**
     * Genera un PDF del CV utilizando una plantilla predeterminada.
     */
    public function generatePdf(Cv $cv)
    {
        // Verificar permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para generar el PDF de este CV.');
        }

        $pdf = Pdf::loadView('cvs.pdf', compact('cv'));
        return $pdf->download('cv_' . Str::slug($cv->full_name) . '.pdf');
    }

    /**
     * Descarga un PDF del CV utilizando una plantilla específica.
     */
    public function downloadPdf(Request $request, Cv $cv)
    {
        // Verificar permisos
        if ($cv->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para descargar el PDF de este CV.');
        }

        $template = $request->get('template', 'template1'); // Plantilla por defecto

        // Validar que la plantilla exista
        $availableTemplates = ['template1', 'template2']; // Agrega más plantillas según necesites
        if (!in_array($template, $availableTemplates)) {
            $template = 'template1';
        }

        $pdf = Pdf::loadView("cvs.templates.{$template}", compact('cv'));

        return $pdf->download("CV_{$cv->full_name}_{$template}.pdf");
    }
}
