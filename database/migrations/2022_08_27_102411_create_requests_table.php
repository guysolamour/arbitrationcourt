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
         Schema::create('requests', function (Blueprint $table) {
           $table->id();

           $table->string('title');
           $table->string('uuid')->unique();
           $table->text('content')->nullable();
           $table->text('defender')->nullable();
           $table->string('amount')->nullable();
           $table->boolean('online');
            $table->foreignId('applicant_id')->nullable()->constrained('users','id')->onDelete('cascade');
            $table->foreignId('defender_id')->nullable()->constrained('users','id')->onDelete('cascade');

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
        Schema::dropIfExists('requests');
    }
};
