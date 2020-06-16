<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegeInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_information', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('main_topic_id')->unsigned();//forign key to main topics
            $table->foreign('main_topic_id')->references('id')
            ->on('main_topics')->onDelete('cascade');;
           /* $table->integer('user_id')->unsigned(); 
    $table->foreign('user_id')->references('id')->on('users');*/
            $table->string('topic');
            $table->text('contents');
            $table->string('media1_path')->nullable();
            $table->string('media2_path')->nullable();
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
        Schema::dropIfExists('college_information');
    }
}
