<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShortcutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shortcuts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('itunes_id')->unique();
            $table->string('name');
            $table->string('icon')->default('defaults/provider.png');
            $table->longText('description')->nullable();
            $table->enum('approval_status', ["approved", "denied", "pending"])->default("pending");
            $table->longText('approval_message')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('shortcuts');
    }
}
