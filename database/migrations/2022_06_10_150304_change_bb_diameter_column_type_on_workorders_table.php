<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBbDiameterColumnTypeOnWorkordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workorders', function (Blueprint $table) {
            //
            $table->decimal('bb_diameter',15,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workorders', function (Blueprint $table) {
            //
            $table->bigInteger('bb_diameter')->change();
        });
    }
}
