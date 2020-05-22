<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop', function (Blueprint $table) {
            $table->bigIncrements('id');

            // Basic Data
            $table->enum('type', ['delivery', 'restaurants', 'partyServices', 'dinner'])->default('delivery');
            $table->string('name', 100);
            $table->string('logo', 100)->nullable();
            $table->string('meta_description', 250)->nullable();
            $table->json('reserved_food_type');

            // Set Up data
            $table->enum('commission', ['free', 'percentage', 'fix', 'monthly'])->default('fix');
            $table->enum('payment_type', ['all', 'selected'])->default('all');
            $table->json('order_transfar')->nullable();
            $table->json('payment_method')->nullable();
            $table->json('delivery_options')->nullable();
            $table->double('delivery_cost', 8, 2)->default(0.00);
            $table->double('mini_oder_cost', 8, 2)->default(0.00);
            $table->double('charge', 8, 2)->default(0.00);
            $table->enum('payout_schedule', ['daily', 'weekly', 'monthly'])->default('daily');
            $table->enum('payout_type', ['paypal', 'bankAccoutn'])->default('paypal');

            $table->timestamps();
        });

        Schema::create('shop_shop_kitchen', function (Blueprint $table) {
            $table->integer('shop_id');
            $table->integer('shop_kitchen_id');
        });

        Schema::create('shop_shop_service', function (Blueprint $table) {
            $table->integer('shop_id');
            $table->integer('shop_service_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop');
        Schema::dropIfExists('shop_shop_kitchen');
        Schema::dropIfExists('shop_shop_service');
    }
}
