<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryOrderDeliveryHistory extends Model
{
    protected $fillable = [
        'secondary_order_id',
        'pos_id',
        'is_otc',
        'product_sku',
        'delivered_quantity',
        'delivered_by',
        'delivered_at',
        'created_by',
        'modified_by',
        'ip',
        'browser',
    ];    
    
   
}
