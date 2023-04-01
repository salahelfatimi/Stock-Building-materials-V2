<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('controlerregesters', function (Blueprint $table) {
            $table->id();
            $table->string('fullName');
            $table->string('idCard');
            $table->string('Address');
            $table->string('speciality');
            $table->string('phoneNum');
            $table->string('email');
            $table->date('dateStart');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('controlerregesters');
    }
};
