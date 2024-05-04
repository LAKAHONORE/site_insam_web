<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cycle;
use App\Models\Niveau;
use App\Models\Specialite;

class AjaxController extends Controller
{
    public function filtre(Request $request)
    {
        switch (true) {
            case !empty($request->cycle_id) && empty($request->specialite_id) && empty($request->filiere_id) && empty($request->niveau_id) && empty($request->periode):
                switch (Cycle::find($request->cycle_id)->code) {
                    case 'bts':
                        return [
                            'filieres' => Cycle::find($request->cycle_id)->filieres,
                            'niveaux' => Niveau::whereIn('intitule', [1,2])->get(),
                        ];
                    break;
                    case 'licence':
                        return [
                            'filieres' => Cycle::find($request->cycle_id)->filieres,
                            'niveaux' => Niveau::where('intitule', 3)->get(),
                        ];
                    break;
                    case 'master':
                        return [
                            'filieres' => Cycle::find($request->cycle_id)->filieres,
                            'niveaux' => Niveau::where('intitule', [4,5])->get(),
                        ];
                    break;
                }
            break;

            case empty($request->cycle_id) && empty($request->specialite_id) && !empty($request->filiere_id) && empty($request->niveau_id) && !empty($request->periode):
                return Specialite::where([
                    'filiere_id' => $request->filiere_id,
                    'periode' => $request->periode,
                ])->get();
            break;

            case empty($request->cycle_id) && !empty($request->specialite_id) && empty($request->filiere_id) && !empty($request->niveau_id) && empty($request->periode):
                return Specialite::find($request->specialite_id)->matieres($request->niveau_id);
            break;
            
            default:
                return 'default';
                break;
        }
    }
}
