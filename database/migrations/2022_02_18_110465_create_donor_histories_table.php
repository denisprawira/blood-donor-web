<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donor_histories', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_pmi')->constrained('pmi');
            $table->string('blood_pressure');
            $table->string('body_temperature');
            $table->string('pulse');
            $table->string('hemoglobin');
            $table->dateTime('date', $precision = 0);
            $table->string('location');
            $table->string('description');
            $table->enum('history_type', ['event', 'helprequest','regular']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donor_histories');
    }
}
