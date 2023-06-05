<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summary_view', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('trigger');
            $table->bigInteger('amount');
            $table->timestamps();
        });

        Schema::create('summary_download', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('trigger');
            $table->bigInteger('amount');
            $table->timestamps();
        });

        Schema::create('summary_install', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('trigger');
            $table->bigInteger('amount');
            $table->timestamps();
        });

        Schema::create('summary_uses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->morphs('trigger');
            $table->bigInteger('amount');
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
        Schema::dropIfExists('summary_view');
        Schema::dropIfExists('summary_download');
        Schema::dropIfExists('summary_install');
        Schema::dropIfExists('summary_uses');
    }
}
