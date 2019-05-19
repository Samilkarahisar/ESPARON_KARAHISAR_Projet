<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->unsignedBigInteger('shipping_address_id')->nullable();
            $table->unsignedBigInteger('payment_method_id')->nullable();
            $table->smallInteger('status')->nullable()->default(0);
            $table->date('date')->default(now());
            $table->float('total')->default(0);
            $table->boolean('registered')->default(0);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('billing_address_id')->references('id')->on('address')->onDelete('cascade');
            $table->foreign('shipping_address_id')->references('id')->on('address')->onDelete('cascade');
            $table->foreign('payment_method_id')->references('id')->on('payment_method')->onDelete('cascade');
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
