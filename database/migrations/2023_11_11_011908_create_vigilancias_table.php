<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVigilanciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vigilancias', function (Blueprint $table) {
            $table->id();
            $table->string('placa');
            $table->unsignedBigInteger('id_origindetail'); // Assuming a foreign key relationship with origin_details table
            $table->string('conductor');
            $table->timestamp('fecha_salida')->nullable();
            $table->timestamp('fecha_ingreso')->nullable();
            // Add other columns based on your view requirements

            // Foreign key constraint
            $table->foreign('id_origindetail')->references('id')->on('origin_details')->onDelete('cascade');

            // Timestamps for created_at and updated_at
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vigilancias');
    }
}
