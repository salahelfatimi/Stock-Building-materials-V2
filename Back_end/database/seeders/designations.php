<?php

namespace Database\Seeders;

use App\Models\designation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class designations extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        designation::create([
            'designationName'=>'Conduite Circulaire',
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>'Exhaust Air Round',
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>'Exhaust Air Grille',
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>'Hotte',
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>'Air Extractor',
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>"Caisson d'extraction",
            'speciality'=>'Ventilation'
        ]);
        designation::create([
            'designationName'=>"Saignee Mural",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Boite encastrement 4p",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Boite encastrement 3p",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Boite encastrement 2p",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Boite encastrement 1p",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Pose Tableau Electrique",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Tubage 16",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Cuivre 1/4 + 3/8",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cuivre 1/4 + 1/2",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cuivre 1/4 + 5/8",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cuivre 3/8 + 5/8",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cuivre 3/8 + 3/4",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cuivre 1/2 + 3/4",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Alimentation Electrique",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"PER Froide",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"PER Chaude",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"PPR Froide",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"PPR Chaude",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Retour PPR Chaude",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Raccord PPR",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Raccord PER",
            'speciality'=>'Plomberie'
        ]);
    }
}
