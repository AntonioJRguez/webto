<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task_name', 'plot_id'];

    public function plot(){
        return $this->belongsTo(Plot::class);
    }
}
