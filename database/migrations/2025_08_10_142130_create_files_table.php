<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_files', function (Blueprint $table) {
            $table->id();
            $table->integer('product_id');
            $table->tinyInteger('type')->comment('1 = Huong dan su dung, 2 = Chung nhan san pham');
            $table->string('file_name');
            $table->string('file_path');
            $table->tinyInteger('is_active')->default(1);
            $table->integer('sort')->default(0);
            $table->timestamps();
            $table->index('product_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_files');
    }
}