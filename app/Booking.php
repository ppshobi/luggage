<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $guarded = [];

    public function customer()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
