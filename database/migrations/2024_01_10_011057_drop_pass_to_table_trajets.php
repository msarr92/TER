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
        Schema::table('table_trajets', function (Blueprint $table) {
            Schema::dropIfExists('pass');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('table_trajets', function (Blueprint $table) {
            Schema::create('pass', function (Blueprint $table) {
                $table->id();
                $table->string('gare_Ariver');
                $table->string('gare_Depart');
                $table->date('date_Depart');
                $table->integer('nbreBillet');
                $table->timestamps();
            });
        });
    }
};