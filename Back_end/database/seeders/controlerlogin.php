<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use App\Models\controlerlogin as controlerlogins;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class controlerlogin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        controlerlogins::create([
            'username'=>'user1',
            'password'=>'123',
            'idCard'=>'EE1234',
            'token'=> Str::random(10),

        ]);
        controlerlogins::create([
            'username'=>'user2',
            'password'=>'123',
            'idCard'=>'EE12345',
            'token'=> Str::random(10),

        ]);
        controlerlogins::create([
            'username'=>'user3',
            'password'=>'123',
            'idCard'=>'EE123456',
            'token'=> Str::random(10),

        ]);
    }
}
