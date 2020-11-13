<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    public $timestamps = true;

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }

    /**
     * get active status (id not 4 or 5)
     * @return void
     */
    public function scopeActive($query)
    {
        return $query->whereNotIn('id', [4, 5]);
    }
}
