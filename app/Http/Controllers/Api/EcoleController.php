<?php

namespace App\Http\Controllers\Api;

use App\Models\Ecole;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EcoleController extends Controller
{
    public function index()
    {
        $ecoles = Ecole::all();

        return response()->json([
            'ecoles'=>$ecoles,
            'statut'=>200
        ]);
    }
}
