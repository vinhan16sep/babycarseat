<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('posts')) {
            return;
        }
        Schema::create('posts', function (Blueprint $table) {
			$table->increments('id');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title', 255);
            $table->text('slug');
            $table->tinyInteger('position');
            $table->integer('sort')->default('0');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->text('content')->nullable();
            $table->tinyInteger('is_active');
            $table->tinyInteger('menu_active');
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
        Schema::dropIfExists('posts');
    }
}
