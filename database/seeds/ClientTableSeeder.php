<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    DB::table('client')->insert([
      'first_name' => 'Rohan',
      'last_name' => 'Solyam',
      'email' => 'rohan@gmail.com',
      'telephone_number' => '(888) 937-7238',
      'status' => 'active'
    ]);

    factory(App\Client::class, 50)->create();
  }
}
