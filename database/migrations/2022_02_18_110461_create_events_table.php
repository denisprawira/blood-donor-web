<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_user')->nullable()->constrained('users');
            $table->foreignId('id_pmi')->constrained('pmi');
            $table->string('title')->nullable();
            $table->string('institution')->nullable();
            $table->string('description')->nullable();
            $table->string('img')->nullable();
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('address')->nullable();
            $table->integer('target')->nullable();
            $table->dateTime('post_at', $precision = 0);
            $table->dateTime('date_start', $precision = 0);
            $table->dateTime('date_end', $precision = 0)->nullable();
            $table->enum('status', ['pending','approved','disapproved','finished']);
            $table->string('message')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
