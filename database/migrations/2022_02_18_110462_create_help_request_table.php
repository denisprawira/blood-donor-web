<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHelpRequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('help_requests', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_pmi')->constrained('pmi');
            $table->foreignId('blood_type')->constrained('blood_types');
            $table->string('description');
            $table->string('patient_name');
            $table->integer('target');
            $table->string('img')->nullable();
            $table->dateTime('post_at',$precision = 0);
            $table->enum('status', ['pending','approved','disapproved','finished']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('help_requests');
    }
}
