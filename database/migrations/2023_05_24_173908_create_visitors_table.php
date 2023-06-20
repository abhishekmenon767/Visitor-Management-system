<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisitorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        try {
            Schema::create('visitors', function (Blueprint $table) {
                $table->id();
                $table->string('name')->nullable();
                $table->string('email')->nullable();
                $table->integer('mobile_no')->nullable();
                $table->string('address')->nullable();
                $table->string('meet_person_name')->nullable();
                $table->string('department')->nullable();
                $table->string('reason_to_meet')->nullable();
                $table->dateTime('enter_time')->nullable();
                $table->dateTime('out_time')->nullable();
                $table->integer('visitor_enter_by')->nullable();
                $table->timestamps();
            });
        } catch (Exception $e) {
            // Handle the exception
            echo $e->getMessage();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitors');
    }
}
