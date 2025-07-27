<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
			$table->increments('id');
            $table->tinyInteger('location'); // 1: Header, 2: Footer, etc.
            $table->tinyInteger('parent_id')->nullable();
            $table->tinyInteger('position'); // 1: Left, 2: Right, etc.
            $table->string('title', 255);
            $table->string('link', 255)->nullable();
            $table->integer('sort')->default('0');
            $table->tinyInteger('is_active');
            $table->string('created_by', 100);
            $table->string('updated_by', 100);
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
        Schema::dropIfExists('menu');
    }
}
