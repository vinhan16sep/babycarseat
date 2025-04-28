<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTypeColumnIntoHomeBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('home_blocks', function (Blueprint $table) {
			$table->text('short_description')->nullable(true);
			$table->text('description')->nullable(true);
			$table->string('type')->nullable(false);
			$table->text('icon')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('home_blocks', function (Blueprint $table) {
            $table->dropColumn('short_description');
            $table->dropColumn('description');
            $table->dropColumn('type');
            $table->dropColumn('icon');
        });
    }
}
