<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;
    protected $fillable = ['name','sowing_date','harvest_date','status','description','plot_id'];

    public function plot(){
        return $this->belongsTo(Plot::class);
    }
}
