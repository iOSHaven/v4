<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddThemeOrderColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('skins', function (Blueprint $table) {
            $table->integer('order')->nullable();
            $table->integer('downloadCount')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('skins', function (Blueprint $table) {
            $table->dropColumn('order');
            $table->dropColumn('downloadCount');
        });
    }
}
