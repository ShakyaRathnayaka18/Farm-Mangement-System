<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crop extends Model
{
    use HasFactory;

    protected $table = 'crops';

    protected $fillable = [
        'crop_name',
        'crop_type',
        'planting_date',
        'harvest_date',
    ];

    public function growthStages()
    {
        return $this->hasMany(CropGrowth::class, 'crop_id');
    }
}


