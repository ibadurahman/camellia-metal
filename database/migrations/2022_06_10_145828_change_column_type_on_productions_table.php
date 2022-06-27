<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeOnProductionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('productions', function (Blueprint $table) {
            //
            $table->decimal('diameter_ujung',15,2)->change();
            $table->decimal('diameter_tengah',15,2)->change();
            $table->decimal('diameter_ekor',15,2)->change();
            $table->decimal('kelurusan_aktual',15,2)->change();
            $table->decimal('panjang_aktual',15,2)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('productions', function (Blueprint $table) {
            //
            $table->bigInteger('diameter_ujung')->change();
            $table->bigInteger('diameter_tengah')->change();
            $table->bigInteger('diameter_ekor')->change();
            $table->bigInteger('kelurusan_aktual')->change();
            $table->bigInteger('panjang_aktual')->change();
        });
    }
}
