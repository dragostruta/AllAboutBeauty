<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->date('appointment_date');
            $table->unsignedBigInteger('employee_information_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('salon_id');
            $table->unsignedBigInteger('service_id');
            $table->timestamps();

            $table->index('employee_information_id');
            $table->index('user_id');
            $table->index('salon_id');
            $table->index('service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
