<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBatch extends Model
{
    
    protected $fillable = [
        'batch_number',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser'
    ];
}
