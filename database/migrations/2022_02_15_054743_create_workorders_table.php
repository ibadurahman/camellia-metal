<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workorders', function (Blueprint $table) {
            $table->id();

            $table->string('wo_number');
            $table->string('bb_supplier');
            $table->string('bb_grade');
            $table->bigInteger('bb_diameter');
            $table->bigInteger('bb_qty_pcs');
            $table->bigInteger('bb_qty_coil');
            $table->string('fg_customer');
            $table->double('fg_size_1',15,2);
            $table->double('fg_size_2',15,2);
            $table->double('tolerance_plus',15,2);
            $table->double('tolerance_minus',15,2);
            $table->double('fg_reduction_rate',15,2);
            $table->string('fg_shape');
            $table->bigInteger('fg_qty');
            $table->bigInteger('wo_order_num');
            $table->string('operator');
            $table->boolean('status_prod');
            $table->boolean('status_wo');
            $table->unsignedBigInteger('machine_id');
            $table->dateTime('production_date');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('machine_id')->references('id')->on('machines')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workorders');
    }
}
