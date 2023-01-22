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
        Schema::table('drinks', function (Blueprint $table) {
            // $table->unsignedBigInteger()or string esiste già technique non serve fare altro
            // trasformare technique nullable per poi fare null on delate  o utilizzare restrictOnDelete
            // $table->string('technique')->nullable()->change(); // OR // restrictOndelete
            $table->foreign('technique')->references('code')->on('techniques')->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('drinks', function (Blueprint $table) {
            $table->dropForeign('drinks_technique_foreign');
        });
    }
};
