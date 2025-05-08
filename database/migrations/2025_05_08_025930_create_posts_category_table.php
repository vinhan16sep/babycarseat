<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('post_category')) {
            return;
        }
        Schema::create('post_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug', 191)->unique(); // Giảm độ dài của cột slug
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->tinyInteger('level')->default(1);
            $table->tinyInteger('menu_active')->default(1);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('post_category');
    }
}
