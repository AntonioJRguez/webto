<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $fillable = ['task_name', 'plot_id', 'description', 'limit_date', 'completed_date', 'status', 'is_periodic', 'time_period'];

    public function plot()
    {
        return $this->belongsTo(Plot::class);
    }
    public function completedBy()
    {
        return $this->belongsTo(User::class, 'completed_by');
    }
}
