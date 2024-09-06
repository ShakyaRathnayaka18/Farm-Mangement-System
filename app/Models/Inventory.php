<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $table = 'inventory';

    protected $fillable = [
        'id',
        'item_type',
        'quantity',
        'expiry_date',
        'inventory_status',
    ];
}
