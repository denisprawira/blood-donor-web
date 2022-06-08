<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailHelpRequestHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_help_request_histories', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_help_request')->constrained('help_requests');
            $table->foreignId('id_history')->constrained('donor_histories');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_help_request_histories');
    }
}
