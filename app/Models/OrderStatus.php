<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    protected $table = 'order_status';
    public $timestamps = true;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
