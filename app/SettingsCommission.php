<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SettingsCommission extends Model
{
  protected $table = 'settings_commission';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'display', 'percentages', 'fixed', 'monthly'
  ];
}
