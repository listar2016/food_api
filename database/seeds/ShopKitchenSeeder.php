<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ShopKitchenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $this->makeEntry("Arabic food");
      $this->makeEntry("Chinese Food");
      $this->makeEntry("Indian Food");
      $this->makeEntry("French Food");
    }

    public function makeEntry($display){
      App\ShopKitchen::create([
        "display" => $display,
        "uniq_slug" => Str::slug($display, "-")
      ]);
    }
}
