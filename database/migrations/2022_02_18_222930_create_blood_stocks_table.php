<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBloodStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blood_stocks', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_component')->constrained('blood_components');
            $table->foreignId('blood_type')->constrained('blood_types');
            $table->foreignId('id_pmi')->constrained('pmi');
            $table->integer('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blood_stock');
    }
}
