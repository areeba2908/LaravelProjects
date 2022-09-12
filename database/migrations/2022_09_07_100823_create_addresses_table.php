<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('addresses', function (Blueprint $table) {

            $table->increments('id');
            $table->string('address');
            $table->unsignedBigInteger('student_id')->nullable();
            $table->timestamps();
        
        });
        
        Schema::table('addresses', function(Blueprint $table)
        {
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade'); //on table name
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('addresses');
    }
}
