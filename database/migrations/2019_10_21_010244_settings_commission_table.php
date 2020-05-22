<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SettingsCommissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings_commission', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('display', 100);
            $table->string('uniq_slug', 100);
            $table->integer('percentage')->default(0);
            $table->double('fixed', 8, 2)->default(0.00);
            $table->double('monthly', 8, 2)->default(0.00);
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
        Schema::dropIfExists('settings_commission');
    }
}
