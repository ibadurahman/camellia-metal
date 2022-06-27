<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeColumnTypeTo3DecimalOnProductionsTable extends Migration
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
            $table->decimal('diameter_ujung',15,3)->change();
            $table->decimal('diameter_tengah',15,3)->change();
            $table->decimal('diameter_ekor',15,3)->change();
            $table->decimal('kelurusan_aktual',15,3)->change();
            $table->decimal('panjang_aktual',15,3)->change();
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
            $table->decimal('diameter_ujung',15,2)->change();
            $table->decimal('diameter_tengah',15,2)->change();
            $table->decimal('diameter_ekor',15,2)->change();
            $table->decimal('kelurusan_aktual',15,2)->change();
            $table->decimal('panjang_aktual',15,2)->change();
        });
    }
}
