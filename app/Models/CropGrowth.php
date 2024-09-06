<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CropGrowth extends Model
{
    use HasFactory;

    protected $table = 'crops_growth_stages_and_observations';

    protected $fillable = [
        'crop_id',
        'stage_name',
        'recommendation',
        'start_date',
        'end_date',
        'observation_type',
        'description',
        'observation_date',
    ];

    public function crop()
    {
        return $this->belongsTo(Crop::class, 'crop_id');
    }
}
