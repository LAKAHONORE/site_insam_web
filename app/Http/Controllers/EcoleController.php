<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use Illuminate\Http\Request;

class EcoleController extends Controller
{

    public function index()
    {
        return view('admin.ecoles.index', [
            'ecoles' => Ecole::orderBy('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.ecoles.create');
    }

    public function store(Request $request)
    {
        $ecole = Ecole::where([
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ])->first();

        if (!$ecole) {
            Ecole::create([
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule)
            ]);

            return to_route('ecoles.index')->with([
                'message' => 'École crée avec succès',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Cet école existe déjà',
                'type' => 'error',
            ]);
        }
    }

    public function show(Ecole $ecole)
    {
       //
    }

    public function edit(Ecole $ecole)
    {
        return view('admin.ecoles.edit', compact('ecole'));
    }

    public function update(Request $request, Ecole $ecole)
    {
        $old_ecole = Ecole::where([
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ])->first();

        if (!$old_ecole) {
            $ecole->update([
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule)
            ]);
    
            return to_route('ecoles.index')->with([
                'message' => 'Les informations de cet école ont été modifiée avec succès !',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Impossible de modifier les informations de cet école car les informations que vous avez renseigné appartiennent déjà à une autre école !',
                'type' => 'error',
            ]);
        } 
    }

    public function destroy(Ecole $ecole)
    {
        $ecole->delete(); return true;
    }
}
