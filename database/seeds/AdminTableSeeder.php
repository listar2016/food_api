<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Hashing\BcryptHasher;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  public function run() {

    DB::table('oauth_clients')->insert([
      'id' => 499,
      'name' => 'YamiYami_Admin',
      'secret' => 'pmsfTCmNoFU1HLT1l6Duc6XgbbSzTWBCkgaBfnSB',
      'redirect' => 'http://localhost',
      'personal_access_client' => 0,
      'password_client' => 1,
      'revoked' => 0,
      'created_at' => '2019-10-07 10:30:27',
      'updated_at' => '2019-10-07 10:30:27'
    ]);

    DB::table('admin')->insert([
      'first_name' => 'Rohan',
      'last_name' => 'Solyam',
      'email' => 'rohan@gmail.com',
      'services' => json_encode(['Alaska', 'Texas']),
      'telephone_number' => '(888) 937-7238',
      'image' => null,
      'password' => bcrypt('pass')
    ]);

    factory(App\Admin::class, 50)->create();
  }
}
