<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryDeliverySummary extends Model
{
    protected $fillable = [
        'total_sku',
        'total_category',
        'total_price',
        'route_id',
        'total_visited_pos',
        'total_memo',
        'created_by',
        'modified_by',
        'ip',
        'browser',
    ];    
    
}
