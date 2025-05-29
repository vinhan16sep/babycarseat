<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQAsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('qas')) {
            return;
        }
        Schema::create('qas', function (Blueprint $table) {
			$table->increments('id');
            $table->string('qa_type', 100);
            $table->string('question', 255);
            $table->text('answer');
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
        Schema::dropIfExists('qas');
    }
}
