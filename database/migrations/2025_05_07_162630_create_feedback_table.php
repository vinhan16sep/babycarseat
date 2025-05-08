<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFeedBackTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('feedback')) {
            return;
        }
        Schema::create('feedback', function (Blueprint $table) {
			$table->increments('id');
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->smallInteger('rate')->default(5);
            $table->text('rate_by')->nullable();
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
        Schema::dropIfExists('feedback');
    }
}
