<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->integer('app_id');
            $table->integer('provider_id');
            $table->longText('install_link')->nullable();
            $table->longText('download_link')->nullable();
            $table->integer('fileSizeInBytes')->nullable();
            $table->string('minimumOsVersion')->nullable();
            $table->longText('description')->nullable();
            $table->longText('iconURL')->nullable();
            $table->string('formattedPrice')->nullable();
            $table->string('sellerName')->nullable();
            $table->longText('releaseNotes')->nullable();
            $table->string('genres')->nullable();
            $table->string('sellerURL')->nullable();
            $table->string('version')->nullable();
            $table->timestamp('fetched_at')->nullable();
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
        Schema::dropIfExists('mirrors');
    }
}
