<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name', 100);
            $table->string('last_name', 100);
            $table->string('password');
            $table->string('email', 150)->unique();
            $table->enum('gender',['','M','F'])->nullable();
            $table->string('telephone_number')->nullable();
            $table->string('street')->nullable();
            $table->string('street_number')->nullable();
            $table->String('floor')->nullable();
            $table->string('zip_code')->nullable();
            $table->enum('direction', ['','left', 'middle', 'right'])->nullable();
            $table->string('room_number')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('user');
    }
}
