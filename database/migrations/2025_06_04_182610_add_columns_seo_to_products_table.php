<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsSeoToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
			$table->string('meta_title', 255)->nullable();
			$table->string('meta_description', 255)->nullable();
			$table->string('meta_keywords', 255)->nullable();
			$table->string('meta_robots', 255)->nullable();
			$table->text('canonical_url')->nullable();
			$table->string('og_title', 255)->nullable();
			$table->string('og_description', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('meta_title');
            $table->dropColumn('meta_description');
            $table->dropColumn('meta_keywords');
            $table->dropColumn('meta_robots');
            $table->dropColumn('canonical_url');
            $table->dropColumn('og_title');
            $table->dropColumn('og_description');
        });
    }
}
