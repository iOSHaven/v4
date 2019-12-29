<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAnalyticColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->analytics();
        });
        Schema::table('itms', function (Blueprint $table) {
            $table->analytics();
        });
        Schema::table('ipas', function (Blueprint $table) {
            $table->analytics();
        });
        Schema::table('shortcuts', function (Blueprint $table) {
            $table->analytics();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->dropAnalytics();
        });
        Schema::table('itms', function (Blueprint $table) {
            $table->dropAnalytics();
        });
        Schema::table('ipas', function (Blueprint $table) {
            $table->dropAnalytics();
        });
        Schema::table('shortcuts', function (Blueprint $table) {
            $table->dropAnalytics();
        });
    }
}
