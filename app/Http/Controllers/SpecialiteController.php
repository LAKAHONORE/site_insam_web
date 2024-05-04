<?php

namespace App\Http\Controllers;

use App\Models\Filiere;
use App\Models\Niveau;
use App\Models\Specialite;
use Illuminate\Http\Request;

class SpecialiteController extends Controller
{
    public function index()
    {
        return view('admin.specialites.index', [
            'specialites' => Specialite::orderBy('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.specialites.create',[
            'filieres' => Filiere::orderBy('intitule')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $specialite = Specialite::where([
            'filiere_id' => $request->filiere_id,
            'intitule' => strtolower($request->intitule),
            'periode' => strtolower($request->periode),
        ])->get();

        if ($specialite->isEmpty()) {
            Specialite::create([
                'filiere_id' => $request->filiere_id,
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule),
                'periode' => strtolower($request->periode),
            ]);
            return redirect()->route('specialites.index')->with([
                'message' => 'Spécialitée crée avec succès',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Cette SPécialitée existe déjà !',
                'type' => 'error',
            ]);
        }
    }

    public function show(Specialite $specialite)
    {
        return view('admin.specialites.app', [
            'specialite' => $specialite,
            'niveaux' => Niveau::orderBy('id', 'asc')->get(),
        ]);
    }

    public function edit(Specialite $specialite)
    {
        return view('admin.specialites.edit', [
            'specialite' => $specialite,
            'filieres' => count(Filiere::all()) > 1
            ? Filiere::whereNotIn('id',[$specialite->filiere_id])->get()
            : Filiere::all(),
        ]);
    }

    public function update(Request $request, Specialite $specialite)
    {
        $specialite->update([
            'filiere_id' => $request->filiere_id,
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
            'periode' => strtolower($request->periode),
        ]);

        return redirect()->route('specialites.index')->with([
            'message' => 'Spécialitée modifiée avec succès',
            'type' => 'success',
        ]);
    }

    public function destroy(Specialite $specialite)
    {
        //
    }

    public function option($option, $specialite_id, $niveau_id)
    {
        switch ($option) {
            case 'matieres':
                return view('admin.specialites.option', [
                    'option' => 'matieres',
                    'niveau' => Niveau::find($niveau_id),
                    'specialite' => Specialite::find($specialite_id),
                ]); 
            break;

            case 'etudiants':
                return view('admin.specialites.option', [
                    'option' => 'etudiants',
                    'niveau' => Niveau::find($niveau_id),
                    'specialite' => Specialite::find($specialite_id),
                ]);
            break;            
            default:
            break;
        }
    }
}
