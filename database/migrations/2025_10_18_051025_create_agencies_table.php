<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable('agencies')) {
            return;
        }
        Schema::create('agencies', function (Blueprint $table) {
			$table->increments('id');
            $table->unsignedInteger('city_id')->nullable(false);
            $table->string('name', 255);
            $table->text('address')->nullable();
            $table->text('phone')->nullable();
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
        Schema::dropIfExists('agencies');
    }
}
