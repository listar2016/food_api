<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class SettingsCommissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

      $this->makeEntry("Deliver", 13, 42508.00, 8500.00);
      $this->makeEntry("Dinners", 17, 55500.00, 4500.00);
      $this->makeEntry("Party Service", 23, 32500.00, 1300.00);
      $this->makeEntry("Restaurants", 9, 15000.00, 1200.00);
    }

    public function makeEntry($display, $percentages, $fixed, $monthly){
      App\SettingsCommission::create([
        "display" => $display,
        "uniq_slug" => Str::slug($display, "-"),
        "percentage" => $percentages,
        "fixed" => $fixed,
        "monthly" => $monthly
      ]);
    }
}
