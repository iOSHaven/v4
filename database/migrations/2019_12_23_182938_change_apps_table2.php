<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeAppsTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('apps', function (Blueprint $table) {
            $table->dropColumn('banner');
            $table->dropColumn('unsigned_premium');
            $table->dropColumn('signed_premium');
            $table->dropColumn('views');
            $table->dropColumn('downloads');

            $table->enum('approval_status', ["approved", "denied", "pending"])->default("pending");
            $table->longText('approval_message')->nullable();
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
            $table->string('banner')->default('defaults/banner.png');
            $table->string('unsigned_premium')->nullable();
            $table->string('signed_premium')->nullable();
            $table->bigInteger('views')->default(0);
            $table->bigInteger('downloads')->default(0);

            $table->dropColumn('approval_status');
            $table->dropColumn('approval_message');
            $table->dropForeign('apps_user_id_foreign');
            $table->dropColumn('user_id');
            
        });
    }
}
