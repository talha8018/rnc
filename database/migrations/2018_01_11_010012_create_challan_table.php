<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('unique_id');
            $table->string('due_date',20);
            $table->string('student_name');
            $table->string('sdo');
            $table->string('gender',8);
            $table->string('program',20);
            $table->string('class',20);
            $table->string('inst',5);
            $table->string('voucher_issue_date',20);
            $table->double('education_fee',8,2);
            $table->double('transport_charges',8,2);
            $table->double('miscellaneous',8,2);
            $table->double('others',8,2);
            $table->double('arrears',8,2);
            $table->double('payable_within_due_date',8,2);
            $table->integer('batch')->nullable();
            $table->integer('added_by');
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
        Schema::dropIfExists('challans');
    }
}
