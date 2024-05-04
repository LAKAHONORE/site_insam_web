<?php

namespace App\Http\Controllers;

use App\Models\Ecole;
use App\Models\Cycle;
use Illuminate\Http\Request;

class CycleController extends Controller
{
    public function index()
    {
        return view('admin.cycles.index', [
            'cycles' => Cycle::orderBy('id')->get(),
        ]);
    }

    public function create()
    {
        return view('admin.cycles.create',[
            'ecoles' => Ecole::orderBy('intitule')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $cycle = Cycle::where([
            'ecole_id' => $request->ecole_id,
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ])->get();

        if ($cycle->isEmpty()) {
            Cycle::create([
                'ecole_id' => $request->ecole_id,
                'code' => strtolower($request->code),
                'intitule' => strtolower($request->intitule),
            ]);
            return redirect()->route('cycles.index')->with([
                'message' => 'Cycle crée avec succès',
                'type' => 'success',
            ]);
        } else {
            return back()->with([
                'message' => 'Ce cycle existe déjà !',
                'type' => 'error',
            ]);
        }
    }

    public function show(Cycle $cycle)
    {
        //
    }

    public function edit(Cycle $cycle)
    {
        return view('admin.cycles.edit', [
            'cycle' => $cycle,
            'ecoles' =>  count(Ecole::all()) > 1
            ? Ecole::whereNotIn('id',[$cycle->ecole_id])->get()
            : Ecole::all(),
        ]);
    }

    public function update(Request $request, Cycle $cycle)
    {
        $cycle->update([
            'ecole_id' => $request->ecole_id,
            'code' => strtolower($request->code),
            'intitule' => strtolower($request->intitule),
        ]);

        return redirect()->route('cycles.index')->with([
            'message' => 'Cycle modifiée avec succès',
            'type' => 'success',
        ]);
    }

    public function destroy(Cycle $cycle)
    {
        //
    }
}
