<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryOrderProductDeliveryPlan extends Model
{
    protected $fillable = [
        'po_assigned_product_id',
        'storage_id',
        'quantity',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function popDetails()
    {
        return $this->belongsTo(PrimaryOrderProductDetails::class, 'po_assigned_product_id');
    }
}
