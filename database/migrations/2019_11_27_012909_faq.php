<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Faq extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::dropIfExists('faq');

		Schema::create('faq', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question');
            $table->text('answer');
            $table->unsignedInteger('created_by');
            $table->timestamps();
			$table->foreign('created_by')->references('id')->on('users');        
			$table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faq');
    }
}
