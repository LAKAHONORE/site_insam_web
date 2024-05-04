<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Matiere;
use App\Models\Module;
use App\Models\Specialite;
use Illuminate\Http\Request;

class MatiereController extends Controller
{
    public function index()
    {
        //
    }

    public function create()
    {
        return view('admin.matieres.create',[
            'specialite' => Specialite::find(Request('x')),
            'niveau' => Specialite::find(Request('m')),
            'modules' => Module::orderBy('intitule')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $matiere1 = Matiere::where([
            'annee_id' => Annee::active()->id,
            'module_id' => $request->specialite_id,
            'code' => strtolower($request->code), 
            'intitule' => strtolower($request->intitule),
        ])->get();

        $matiere2 = Matiere::where([
            'specialite_id' => $request->specialite_id,
            'annee_id' => Annee::active()->id,
            'code' => strtolower($request->code), 
            'intitule' => strtolower($request->intitule),
        ])->get();

        if ($matiere1->isEmpty() && $matiere2->isEmpty()) {
            Matiere::create([
                'specialite_id' => $request->specialite_id,
                'niveau_id' => $request->niveau_id,
                'module_id' => $request->module_id,
                'annee_id' => Annee::active()->id,
                'code' => strtolower($request->code), 
                'intitule' => strtolower($request->intitule),
                'credit' => $request->credit, 
                'heure' => $request->heure, 
                'semestre' => $request->semestre, 
            ]);
            return redirect()->route('option', ['matieres', $request->specialite_id, $request->niveau_id])->with([
                'message' => "Matiere ajoutée avec succès",
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => "Cette matiere  existe déjà !",
                'type' => 'error',
            ]);
        }
    }

    public function show(Matiere $matiere)
    {
        //
    }

    public function edit(Matiere $matiere)
    {
        return view('admin.matieres.edit',[
            'specialite' => $matiere->specialite,
            'niveau' =>  $matiere->niveau,
            'modules' => Module::orderBy('intitule')->get(),
            'matiere' => $matiere,
        ]);
    }

    public function update(Request $request, Matiere $matiere)
    {
        $matiere->update([
            'specialite_id' => $request->specialite_id,
            'niveau_id' => $request->niveau_id,
            'module_id' => $request->module_id,
            'annee_id' => Annee::active()->id,
            'code' => strtolower($request->code), 
            'intitule' => strtolower($request->intitule),
            'credit' => $request->credit, 
            'heure' => $request->heure, 
            'semestre' => $request->semestre, 
        ]);
        return redirect()->route('option', ['matieres', $request->specialite_id, $request->niveau_id])->with([
            'message' => "Matiere modifiée avec succès",
            'type' => 'success',
        ]);
    }

    public function destroy(Matiere $matiere)
    {
        //
    }
}
