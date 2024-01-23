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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->date('dateReservation');
            $table->unsignedBigInteger('idUser');
            $table->unsignedBigInteger('idTrajet');
            $table->foreign('idUser')->references('id')->on('users');
            $table->foreign('idTrajet')->references('id')->on('trajets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
