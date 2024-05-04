<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Annee;
use App\Models\Cycle;
use App\Models\Ecole;
use App\Models\Examen;
use App\Models\Module;
use App\Models\Niveau;
use App\Models\Filiere;
use App\Models\Specialite;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Ecole::create([
            'code'=>'INSAM',
            'intitule'=>'institut de l\'estuaire',
            'slug'=>'institut-de-l-estuaire'
        ]);

        Ecole::create([
            'code'=>'ISTE',
            'intitule'=>'institut de Technologie',
            'slug'=>'institut-de-technologie'
        ]);

        // Niveaux
        foreach ([1, 2, 3, 4, 5] as $niveau) {
            Niveau::create([
                'intitule' => $niveau
            ]);
        }

        // Examens
        $examens = [
            [
                'code' => 'cc',
                'intitule' => 'controle continu'
            ],
            [
                'code' => 'sn',
                'intitule' => 'session normale'
            ],
            [
                'code' => 'sr',
                'intitule' => 'session de rattrapage'
            ]
        ];
        foreach ($examens as $examen) {
            Examen::create([
                'code' => $examen['code'],
                'intitule' => $examen['intitule'],
            ]);
        }

        // Modules
        $modules = [
            [
                'code' => 'igl111',
                'intitule' => 'ingenieurie du génie logiciel',
                'categorie' => 'fondamentales'
            ],
            [
                'code' => 'pmw113',
                'intitule' => 'programmation web',
                'categorie' => 'professionelles'
            ],
        ];
        foreach ($modules as $module) {
            Module::create([
                'code' => $module['code'],
                'intitule' => $module['intitule'],
                'categorie' => $module['categorie'],
            ]);
        }

        // Annees
        $annees = [
            [
                'intitule' => '2023/2024',
                'etat' => 1
            ],
            [
                'intitule' => '2024/2025',
                'etat' => 0
            ],
            [
                'intitule' => '2025/2026',
                'etat' => 0
            ]
        ];
        foreach ($annees as $annee) {
            Annee::create([
                'intitule' => $annee['intitule'],
                'etat' => $annee['etat'],
            ]);
        }

        // Cycles
        $cycles = [
            [
                'code'=>'bts',
                'intitule'=>'brevet de technicien superieur'
            ],
            [
                'code'=>'licence',
                'intitule'=>'licence'
            ],
            [
                'code'=>'master',
                'intitule'=>'master'
            ],
        ];

        foreach ($cycles as $cycle) {
            Cycle::create([
                'ecole_id' => 1,
                'code' => $cycle['code'],
                'intitule' => $cycle['intitule'],
            ]);
        }

        // Filieres
        $filieres = [
            [
                'code'=>'gi',
                'intitule'=>'génie informatique'
            ],
            [
                'code'=>'gc',
                'intitule'=>'génie civil'
            ]
        ];

        foreach ($filieres as $filiere) {
            Filiere::create([
                'cycle_id' => 1,
                'code' => $filiere['code'],
                'intitule' => $filiere['intitule'],
            ]);

            Filiere::create([
                'cycle_id' => 2,
                'code' => $filiere['code'],
                'intitule' => $filiere['intitule'],
            ]);

            Filiere::create([
                'cycle_id' => 3,
                'code' => $filiere['code'],
                'intitule' => $filiere['intitule'],
            ]);
        }

        $specialites = [
            [
                'code'=>'gl',
                'intitule'=>'génie logiciel',
                'periode'=>'jour',
            ]
        ];

        foreach ($specialites as $specialite) {
            Specialite::create([
                'filiere_id' => 1,
                'code' => $specialite['code'],
                'intitule' => $specialite['intitule'],
                'periode' => $specialite['periode'],
            ]);

            Specialite::create([
                'filiere_id' => 2,
                'code' => $specialite['code'],
                'intitule' => $specialite['intitule'],
                'periode' => $specialite['periode'],
            ]);

            Specialite::create([
                'filiere_id' => 3,
                'code' => $specialite['code'],
                'intitule' => $specialite['intitule'],
                'periode' => $specialite['periode'],
            ]);
        }

        
    }
}
