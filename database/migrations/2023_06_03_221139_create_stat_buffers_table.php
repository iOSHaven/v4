<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stat_buffers', function (Blueprint $table) {
            $table->id();
            $table->nullableMorphs('target');
            $table->string('event');
            $table->integer('day_1')->default(0);
            $table->integer('day_2')->default(0);
            $table->integer('day_3')->default(0);
            $table->integer('day_4')->default(0);
            $table->integer('day_5')->default(0);
            $table->integer('day_6')->default(0);
            $table->integer('day_7')->default(0);
            $table->integer('total')->default(0);
            $table->integer('running_total')->default(0);
            $table->timestamps();

            $table->unique(['target_id', 'target_type', 'event', 'created_at'], 'unique_buffer_event');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stat_buffers');
    }
};
