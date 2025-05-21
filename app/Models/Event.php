<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{

    use HasFactory;
    protected $fillable = [
        'name', 'description', 'event_date', 'location', 'capacity','duration',
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
