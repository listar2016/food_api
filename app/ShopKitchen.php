<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopKitchen extends Model
{
  protected $table = 'shop_kitchen';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];
}
