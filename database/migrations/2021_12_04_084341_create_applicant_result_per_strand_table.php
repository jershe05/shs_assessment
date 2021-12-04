<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicantResultPerStrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_result_per_strand', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('applicant_id')->nullable();
            $table->bigInteger('strand_id')->nullable();
            $table->float('result')->nullable();
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
        Schema::dropIfExists('applicant_result_per_strand');
    }
}
