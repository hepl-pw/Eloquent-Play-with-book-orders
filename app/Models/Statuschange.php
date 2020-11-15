<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Statuschange extends Model
{
    protected $table = 'statuschanges';
    public $timestamps = true;

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

}
