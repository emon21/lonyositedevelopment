<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FinancialTab extends Model
{
    protected $guarded = [];


    public function financial()
    {
        return $this->belongsTo(Financial::class);
    }
}
