<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\designation;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([ designations::class]);
        $this->call([ admin::class]);
        \App\Models\controlerregester::factory(20)->create();
        \App\Models\controlerlogin::factory(20)->create();
        \App\Models\chicklist::factory(20)->create();

        \App\Models\daysworked::factory(20)->create();


        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
