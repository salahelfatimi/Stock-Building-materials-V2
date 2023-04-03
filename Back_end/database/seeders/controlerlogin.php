<?php

namespace Database\Seeders;

use App\Models\controlerlogin as controlerlogins;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class controlerlogin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        controlerlogins::create([
            'username'=>'king',
            'password'=>'123',
            'idCard'=>'EE1234',
            'token'=>'qwe123',

        ]);
        controlerlogins::create([
            'username'=>'king1',
            'password'=>'123',
            'idCard'=>'EE12345',
            'token'=>'qwe1234',

        ]);
        controlerlogins::create([
            'username'=>'king1',
            'password'=>'123',
            'idCard'=>'EE123456',
            'token'=>'qwe12345',

        ]);
    }
}
