<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSkinsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('skins');
        Schema::create('skins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('uuid')->index();
            $table->string('name');
            $table->longText('description');
            $table->longText('images');
            $table->integer('salePrice');
            $table->integer('price');
            $table->boolean('onSale');
            $table->longText('download');
            $table->timestamps();
            $table->softDeletes();
        });
        Schema::dropIfExists('skin_user');
        Schema::create('skin_user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('skin_id')->unsigned()->index()->nullable();
            $table->foreign('skin_id')->references('id')->on('skins')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->index()->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('skins');
    }
}
