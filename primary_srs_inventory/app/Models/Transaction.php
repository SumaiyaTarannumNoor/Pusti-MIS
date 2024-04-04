<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $fillable = [
        'transaction_mode_id',
        'product_item_id',
        'quantity',
        'transaction_date',
        'source_type_id',
        'source_id',
        'destination_type_id',
        'destination_id',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser'
    ];
}
