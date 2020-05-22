<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->makeEntry("Delivery");
      $this->makeEntry("Pickup");
      $this->makeEntry("Dine In");
      $this->makeEntry("Take Away");
    }

    public function makeEntry($display){
      App\ShopService::create([
        "display" => $display,
        "uniq_slug" => Str::slug($display, "-")
      ]);
    }
}
