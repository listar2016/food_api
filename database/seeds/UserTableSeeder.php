<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('oauth_clients')->insert([
            'id' => 3,
            'name' => 'YamiYami_User',
            'secret' => 'wxeTqhFttkNtRPlLvjAPOHYueoGyx07G0QUIPQjQ ',
            'redirect' => 'http://localhost',
            'personal_access_client' => 0,
            'password_client' => 1,
            'revoked' => 0,
            'created_at' => '2019-10-09 09:54:02',
            'updated_at' => '2019-10-09 09:54:02'
          ]);
    }
}
