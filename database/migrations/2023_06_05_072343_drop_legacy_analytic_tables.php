<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

require_once __DIR__ . "/2019_12_29_015148_create_view_summary_table.php";
require_once __DIR__ . "/2019_12_15_222228_create_views_table.php";
require_once __DIR__ . "/2019_12_16_031603_create_downloads_table.php";
require_once __DIR__ . "/2019_12_16_031648_create_installs_table.php";

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        resolve(CreateViewSummaryTable::class)->down();
        resolve(CreateViewsTable::class)->down();
        resolve(CreateInstallsTable::class)->down();
        resolve(CreateDownloadsTable::class)->down();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        resolve(CreateViewsTable::class)->up();
        resolve(CreateInstallsTable::class)->up();
        resolve(CreateDownloadsTable::class)->up();
        resolve(CreateViewSummaryTable::class)->up();
    }
};
