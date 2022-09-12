<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookname');
            $table->boolean('available')->default(1);
            $table->unsignedBigInteger('student_id')->nullable();
            $table->timestamps();
        });

        Schema::table('books', function(Blueprint $table)
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
        Schema::dropIfExists('books');
    }
}
