<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_logs', function (Blueprint $table) {
            $table->id();
            $table->string('card_uid')->foreign()->references('card_uid')->on('user_cards');
            $table->date('check_in_date')->nullable();
            $table->string('time_in', 10)->nullable();
            $table->string('time_out', 10)->nullable();
            $table->boolean('card_out')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_logs');
    }
}
