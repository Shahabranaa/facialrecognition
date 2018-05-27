<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNadraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nadra', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CNIC');
            $table->string('father_CNIC');
            $table->string('mother_CNIC');
            $table->string('name');
            $table->string('address');
            $table->date('birth_date');
            $table->text('image');
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
        Schema::dropIfExists('nadra');
    }
}
