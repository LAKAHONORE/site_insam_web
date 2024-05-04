<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;


class RouteController extends Controller
{


    public function accueil()
    {
        include_once('config.php');

        $response = Http::get($url_back.'ecoles');

        $ecoles = $response->json();


        foreach ($ecoles['ecoles'] as $ecole) {
            $ecolesTransformees[] = [
                'code' => $ecole['code'],
                'intitule' => $ecole['intitule'],
                'slug' => $ecole['slug']
            ];
        }

       // dd($ecolesTransformees);
        return view('Home', ['ecoles'=>$ecolesTransformees]);
    }


    public function about()
    {
        return view('about');
    }


    public function actualite()
    {
        return view('Actualite');
    }

    public function pre_registration()
    {
        return view('PreInscription');
    }


    public function dashboard()
    {
        return view('admin.dash');
    }

    public function notfound()
    {
        return view('NotFound');
    }
}
