<?php

namespace App\Http\Controllers;

use App\Models\Cycle;
use App\Models\Filiere;
use Illuminate\Http\Request;

class FiliereController extends Controller
{
    public function index()
    {
        return view('admin.filieres.index', [
            'filieres' => Filiere::orderBy('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.filieres.create',[
            'cycles' => Cycle::orderBy('intitule')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $filiere = Filiere::where([
            'cycle_id' => $request->cycle_id,
            'intitule' => strtolower($request->intitule),
        ])->get();

        if ($filiere->isEmpty()) {
            Filiere::create([
                'cycle_id' => $request->cycle_id,
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule),
            ]);
            return redirect()->route('filieres.index')->with([
                'message' => 'Filière crée avec succès',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Cette filière existe déjà !',
                'type' => 'error',
            ]);
        }
    }

    public function show(Filiere $filiere)
    {
        //
    }

    public function edit(Filiere $filiere)
    {
        return view('admin.filieres.edit', [
            'filiere' => $filiere,
            'cycles' => count(Cycle::all()) > 1
            ? Cycle::whereNotIn('id',[$filiere->cycle_id])->get()
            : Cycle::all(),
        ]);
    }

    public function update(Request $request, Filiere $filiere)
    {
        $filiere->update([
            'cycle_id' => $request->cycle_id,
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ]);

        return redirect()->route('filieres.index')->with([
            'message' => 'Filière modifiée avec succès',
            'type' => 'success',
        ]);
    }

    public function destroy(Filiere $filiere)
    {
        //
    }
}
