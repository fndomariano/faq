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
		Schema::create('faq', function (Blueprint $table) {
			$table->increments('id');
			$table->string('reference');
			$table->integer('useful');
			$table->integer('useless');
            $table->text('question');
            $table->text('answer');
            $table->integer('created_by')->unsigned();
            $table->timestamps();
			$table->foreign('created_by')->references('id')->on('users');        			
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
