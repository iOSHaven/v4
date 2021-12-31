<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePivotsForItmsAndIpas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itms_provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('itms_id')->unsigned()->index();
            $table->foreign('itms_id')->references('id')->on('itms')->onDelete('cascade');
            $table->bigInteger('provider_id')->unsigned()->index();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('app_itms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('app_id')->unsigned()->index();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->bigInteger('itms_id')->unsigned()->index();
            $table->foreign('itms_id')->references('id')->on('itms')->onDelete('cascade');

            $table->timestamps();
        });

        Schema::create('ipa_provider', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('ipa_id')->unsigned()->index();
            $table->foreign('ipa_id')->references('id')->on('ipas')->onDelete('cascade');
            $table->bigInteger('provider_id')->unsigned()->index();
            $table->foreign('provider_id')->references('id')->on('providers')->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('app_ipa', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('app_id')->unsigned()->index();
            $table->foreign('app_id')->references('id')->on('apps')->onDelete('cascade');
            $table->bigInteger('ipa_id')->unsigned()->index();
            $table->foreign('ipa_id')->references('id')->on('ipas')->onDelete('cascade');

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
        Schema::dropIfExists('itms_provider');
        Schema::dropIfExists('app_itms');
        Schema::dropIfExists('ipa_provider');
        Schema::dropIfExists('app_ipa');
    }
}
