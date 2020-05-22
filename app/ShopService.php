<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopService extends Model
{
  protected $table = 'shop_service';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug'
    ];
}
