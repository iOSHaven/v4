<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAppsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default('No name');
            $table->string('uid')->unique();
            $table->string('icon')->nullable();
            $table->string('banner')->nullable();
            $table->string('unsigned')->nullable();
            $table->string('signed')->nullable();
            $table->string('version')->nullable();
            $table->string('short', 18)->nullable();
            $table->text('description');
            $table->string('tags')->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('downloads')->default(0);
            $table->bigInteger('size')->default(0);
            $table->softDeletes();
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
        Schema::dropIfExists('apps');
    }
}
