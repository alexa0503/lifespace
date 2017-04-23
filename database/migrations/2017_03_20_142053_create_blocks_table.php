<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blocks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('page_id')->nullable()->index()->unsigned();
            $table->foreign('page_id')->references('id')->on('pages');
            $table->string('name',120);
            $table->string('title',120);
            $table->text('content');
            $table->string('description',200);
            $table->string('image',200);
            $table->integer('sort_id');
            $table->boolean('is_posted');
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
        Schema::dropIfExists('blocks');
    }
}
