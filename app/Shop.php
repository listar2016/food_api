<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
  protected $table = 'shop';

  public function shopKitchen() {
    return $this->belongsToMany('App\ShopKitchen', 'shop_shop_kitchen', 'shop_id', 'shop_kitchen_id');
  }

  public function shopService() {
    return $this->belongsToMany('App\ShopService', 'shop_shop_service', 'shop_id', 'shop_service_id');
  }
}
