<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailyReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daily_reports', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->dateTime('report_date');
=======
            $table->date('report_date');
>>>>>>> 7f83a741feb19833503f2683c83cfe0e246ada09
            $table->bigInteger('total_runtime');
            $table->bigInteger('total_downtime');
            $table->bigInteger('total_pcs');
            $table->bigInteger('total_weight_fg');
            $table->bigInteger('total_weight_bb');
            $table->bigInteger('average_speed');
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
        Schema::dropIfExists('daily_reports');
    }
}
