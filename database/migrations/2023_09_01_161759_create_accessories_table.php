<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccessoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accessories', function (Blueprint $table) {
			$table->increments('id');
			$table->integer('accessory_category_id')->unsigned();
			$table->string('name', 255);
            $table->text('slug');
			$table->text('image')->nullable();
            $table->text('description')->nullable();
			$table->text('content')->nullable();
			$table->tinyInteger('is_active')->default('1');
			$table->tinyInteger('is_new')->default('0');
			$table->tinyInteger('is_highlight')->default('0');
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
        Schema::dropIfExists('accessories');
    }
}
