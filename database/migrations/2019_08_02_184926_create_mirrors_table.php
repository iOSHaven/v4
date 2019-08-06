<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMirrorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mirrors', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer("app_id")->unsigned()->index()->nullable();
            $table->string("provider")->nullable();
            $table->longText("link")->nullable();
            $table->string("type")->nullable();
            $table->timestamps();

            $table->foreign("app_id")->references("id")->on("apps");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mirrors');
    }
}
