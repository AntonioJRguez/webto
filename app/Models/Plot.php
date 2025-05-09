<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plot extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description','plot_code'];

    public function tasks() {
        return $this->hasMany(Task::class);
    }
    public function users() {
        return $this->hasMany(User::class, 'plot_code', 'plot_code');
    }
    public function crops() {
        return $this->hasMany(Crop::class);
    }
    
}
