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
        Schema::create('chicklists', function (Blueprint $table) {
            $table->id();
            $table->string('designation');
            $table->integer('qtyCompleted');
            $table->integer('remainingQty');
            $table->integer('personsNumber');
            $table->string('blocName');
            $table->foreignId('idControler')->constrained('controlerregesters');
            $table->date('dateValidation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chicklists');
    }
};
