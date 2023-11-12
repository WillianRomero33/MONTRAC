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
        Schema::create('transport_statuses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_transport')->unsigned();
            $table->foreign('id_transport')->references('id')->on('transports');
            $table->bigInteger('id_origindetail')->unsigned();
            $table->foreign('id_origindetail')->references('id')->on('origin_details');
            $table->string('estado')->nullable();
            $table->smallinteger('selectivo')->nullable();
            $table->dateTime('inicio_transito')->nullable();
            $table->dateTime('fin_transito')->nullable();
            $table->dateTime('inicio_selectivo')->nullable();
            $table->dateTime('fin_selectivo')->nullable();
            $table->dateTime('fin_revision')->nullable();
            $table->dateTime('descarga')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transport_statuses');
    }
};
