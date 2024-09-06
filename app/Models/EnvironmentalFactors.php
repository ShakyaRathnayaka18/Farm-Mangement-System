<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnvironmentalFactors extends Model
{
    use HasFactory;

    protected $table = 'environmental_factors';

    // Specify the fillable properties
    protected $fillable = [
        'location',
        'soil_moisture',
        'soil_ph_level',
        'temperature',
        'wind_speed',
        'additional_notes',
    ];
}
