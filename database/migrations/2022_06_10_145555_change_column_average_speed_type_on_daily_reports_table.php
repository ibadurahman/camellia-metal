<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnAverageSpeedTypeOnDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('daily_reports', function (Blueprint $table) {
            //
            $table->decimal('average_speed',15,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('daily_reports', function (Blueprint $table) {
            //
            $table->bigInteger('average_speed')->change();
        });
    }
}
