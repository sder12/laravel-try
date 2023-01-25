<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drink_ingredient', function (Blueprint $table) {
            $table->unsignedBigInteger('drink_id');
            $table->foreign('drink_db')->references('id')->on('drinks')->cascadeOnDelete();

            $table->unsignedBigInteger('ingredient_id');
            $table->foreign('ingredient_db')->references('id')->on('ingredients')->restrictOnDelete();

            $table->float('quantity', 8, 4);

            $table->primary(['drink_id', 'ingredent_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drink_ingredient');
    }
};
