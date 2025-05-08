<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeatureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('feature')) {
            return;
        }
        Schema::create('feature', function (Blueprint $table) {
			$table->increments('id');
            $table->string('label', 255);
            $table->string('title', 255);
            $table->text('slug');
            $table->text('image')->nullable();
            $table->text('sort_content')->nullable();
            $table->text('content')->nullable();
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
        Schema::dropIfExists('feature');
    }
}
