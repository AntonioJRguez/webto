<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'name', 'description', 'event_date', 'location', 'capacity',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
