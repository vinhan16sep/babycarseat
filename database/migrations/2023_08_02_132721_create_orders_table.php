<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
			$table->increments('id');
			$table->bigInteger('total_price')->default('0');
			$table->integer('discount_percent')->default('0');
			$table->bigInteger('discounted_price')->default('0');
			$table->tinyInteger('payment_method');
			$table->string('code', 10);
			$table->tinyInteger('status')->default('0');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
