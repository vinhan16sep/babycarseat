<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnCodeToFormSafeAndWarrantyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('formsafe', function (Blueprint $table) {
            $table->string('code')->after('product_code')->nullable(true);
        });
        Schema::table('formwarranty', function (Blueprint $table) {
            $table->string('code')->after('product_code')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('formsafe', function (Blueprint $table) {
            $table->dropColumn('code');
        });
        Schema::table('formwarranty', function (Blueprint $table) {
            $table->dropColumn('code');
        });
    }
}
