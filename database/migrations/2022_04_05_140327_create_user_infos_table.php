<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_infos', function (Blueprint $table) {
            $table->id();
            $table->string('user_card_uid')->foreign()->references('uid')->on('user_cards')->nullable();
            $table->string('name');
            $table->enum('gender', ['L', 'P']);
            $table->enum('role', ['Pelajar', 'Guru', 'Staff']);
            $table->boolean('status')->default(1);
            $table->text('address')->nullable();
            $table->string('DOB')->nullable();
            $table->string('unique_identity')->nullable();
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
        Schema::dropIfExists('user_infos');
    }
}
