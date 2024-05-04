<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Composer;
use App\Models\Etudiant;
use App\Models\Examen;
use App\Models\Matiere;
use App\Models\Niveau;
use App\Models\Specialite;
use Illuminate\Http\Request;

class ComposerController extends Controller
{

    public function index()
    {
        return view('admin.notes.filtre-create',[
            'cycles' => Cycle::all(),
            'examens' => Examen::all(),
        ]);
    }

    public function create(Request $request)
    {
        return view('admin.notes.create',[
            'specialite' => Specialite::find($request->specialite_id),
            'matiere' => Matiere::find($request->matiere_id),
            'examen' => Examen::find($request->examen_id),
            'semestre' => $request->semestre,
        ]);
    }

    public function store(Request $request)
    {
        if ($request->composer_id) {
            Composer::find($request->composer_id)->update([
                'note' => $request->note
            ]);
            return true;
        } else {
            Composer::create([
                'inscription_id' => $request->inscription_id,
                'examen_id' => $request->examen_id,
                'matiere_id' => $request->matiere_id,
                'note' => $request->note
            ]);
            return false;
        }
        
    }

    public function show(Composer $composer)
    {
        //
    }

    public function edit(Composer $composer)
    {
        //
    }

    public function update(Request $request, Composer $composer)
    {
        //
    }

    public function destroy(Composer $composer)
    {
        //
    }

    public function filtreReleve()
    {
        return view('admin.notes.filtre-releve',[
            'cycles' => Cycle::all(),
        ]);
    }

    public function etudiants(Request $request)
    {
        return view('admin.notes.etudiants',[
            'specialite' => Specialite::find($request->specialite_id),
            'niveau' => Niveau::find($request->niveau_id),
            'semestre' => $request->semestre,
            'semestre' => $request->semestre,
        ]);
    }

    public function releve($specialite_id, $niveau_id, $etudiant_id)
    {
        return view('admin.notes.releve',[
            'specialite' => Specialite::find($specialite_id),
            'etudiant' => Etudiant::find($etudiant_id),
        ]);
    }
}