<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
   
    protected $fillable = [
        'product_item_id',
        'batch_number',
        'storage_id',
        'production_date',
        'stock_id',
        'supplier_type_id',
        'supplier_id',
        'receiving_time',
        'quantity',
        'expiry_date',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser'
    ];

    public function supplierType()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
