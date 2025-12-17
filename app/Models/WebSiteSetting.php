<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebSiteSetting extends Model
{
     // protected $guarded = [];

     protected $fillable = ['key', 'value'];
}
