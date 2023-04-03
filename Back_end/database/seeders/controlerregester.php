<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\controlerregester as controlerregesters;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class controlerregester extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        controlerregesters::create([
            'fullName'=>'salaheddine elfatimi',
            'idCard'=>'EE1234',
            'Address'=>'adressse  lien',
            'speciality'=>'Plomberie',
            'phoneNum'=>'0602314804',
            'email'=>'salaheddine@gmail.com',
            'dateStart'=>'2023-03-26',
        ]);
        controlerregesters::create([
            'fullName'=>'salaheddine ',
            'idCard'=>'EE12345',
            'Address'=>'adressse  lien',
            'speciality'=>'Electricite',
            'phoneNum'=>'0602314804',
            'email'=>'salaheddine12@gmail.com',
            'dateStart'=>'2023-01-26',
        ]);
        controlerregesters::create([
            'fullName'=>'hamza otmasinte',
            'idCard'=>'EE123456',
            'Address'=>'adressse  lien',
            'speciality'=>'Climatisation',
            'phoneNum'=>'0602312345',
            'email'=>'hamzaotmasinte@gmail.com',
            'dateStart'=>'2023-02-26',
        ]);
    }
}
