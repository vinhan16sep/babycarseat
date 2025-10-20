<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgencyFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agency_files', function (Blueprint $table) {
            $table->id();
            $table->integer('agency_id');
            $table->tinyInteger('type')->default('1')->comment('1 = Catalogue');
            $table->string('file_name');
            $table->string('file_path');
            $table->tinyInteger('is_active')->default(1);
            $table->integer('sort')->default(0);
            $table->timestamps();
            $table->index('agency_id');
        });
    }

    public function down()
    {
        Schema::dropIfExists('agency_files');
    }
}
