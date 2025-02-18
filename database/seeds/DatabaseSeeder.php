<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(AdminTableSeeder::class);
        $this->call(ShopServiceSeeder::class);
        $this->call(ShopKitchenSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(SettingsCommissionTableSeeder::class);
    }
}
