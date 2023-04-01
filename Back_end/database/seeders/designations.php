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
            'designationName'=>"Tubage 13",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Cable Rigide 1,5",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Cable Rigide 2,5",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Souple 2.5 Clim",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Cable Coaxiale",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Cable Ethernet Cat6",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Prise Electrique",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Prise TV/Info/Telephone",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Prise Etanche",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Interrupteur Simple",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Interrupteur Double",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Interrupteur Va et Vient",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Interrupteur Double Va et vien",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Interrupteur Volet Roulant",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Bouton Poussoir",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Spot",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Lustre",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"DDR",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Idiff",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"DD10A",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"DD16A",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"DD25A",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"DD32A",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Telerupteur",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Minuterie",
            'speciality'=>'Electricite'
        ]);
        designation::create([
            'designationName'=>"Parafoudre",
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
            'designationName'=>"Condensat",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Thermostat",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Split 7kw",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Split 5.6kw",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cassette 14kw",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cassette 10kw",
            'speciality'=>'Climatisation'
        ]);
        designation::create([
            'designationName'=>"Cassette 7kw",
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
        designation::create([
            'designationName'=>"Vanne",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Clapet Anti-retour",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Coffret collecteu",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Chaudiere",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Balon de Stockage",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Chauffe eau solaire",
            'speciality'=>'Plomberie'
        ]);
        designation::create([
            'designationName'=>"Pompe",
            'speciality'=>'Plomberie'
        ]);

    }
}
