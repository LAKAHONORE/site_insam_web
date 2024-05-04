<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{

    public function index()
    {
        return view('admin.modules.index', [
            'modules' => Module::orderBy('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.modules.create');
    }

    public function store(Request $request)
    {
        $module = Module::where([
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ])->first();

        if (!$module) {
            Module::create([
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule),
                'categorie' => strtolower($request->categorie)
            ]);

            return to_route('modules.index')->with([
                'message' => 'Module crée avec succès',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Ce module existe déjà',
                'type' => 'error',
            ]);
        }
    }

    public function show(Module $module)
    {
       //
    }

    public function edit(Module $module)
    {
        return view('admin.modules.edit', compact('module'));
    }

    public function update(Request $request, Module $module)
    {
        $module->update([
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
            'categorie' => strtolower($request->categorie)
        ]);

        return to_route('modules.index')->with([
            'message' => 'Les informations de Ce module ont été modifiée avec succès !',
            'type' => 'success',
        ]);
    }

    public function destroy(Module $module)
    {
        $module->delete(); return true;
    }
}
