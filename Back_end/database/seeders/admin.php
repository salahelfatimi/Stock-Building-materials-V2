<?php

namespace Database\Seeders;

use App\Models\admin as admins;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Str;

class admin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        admins::create([
            'username'=>'salah',
            'ferst_name'=>'Salaheddine',
            'last_name'=>'Elfatimi',
            'password'=>'1234',
            'token' => Str::random(10)
        ]);;
        admins::create([
            'username'=>'hamza',
            'ferst_name'=>'Hamza',
            'last_name'=>'Outmassint',
            'password'=>'1234',
            'token' => Str::random(10)
        ]);;
    }
}
