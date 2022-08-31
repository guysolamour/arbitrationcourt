<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
         Schema::create('referes', function (Blueprint $table) {
           $table->id();

           $table->string('name');
           $table->string('uuid')->unique();
           $table->string('email')->nullable();
           $table->string('phone_number')->nullable();
           $table->string('job')->nullable();
           $table->text('about')->nullable();

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
        Schema::dropIfExists('referes');
    }
};
