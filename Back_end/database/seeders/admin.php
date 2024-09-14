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
            'username'=>'admin',
            'ferst_name'=>'admin',
            'last_name'=>'',
            'password'=>'admin',
            'token' => Str::random(10)
        ]);;

    }
}
