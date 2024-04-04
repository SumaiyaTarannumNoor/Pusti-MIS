<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PrimaryOrderProductDetails extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'product_sku_number',
        'storage_unit',
        'quantity',
        'distribution_price',
        'gross_amount',
        'net_amount',
        'primary_order_id',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'ip',
        'browser',
    ];

    protected $dates = ['deleted_at'];

    public function primaryOrder()
    {
        return $this->belongsTo(PrimaryOrder::class, 'primary_order_id');
    }

    public function popDeliveryPlan()
    {
        return $this->hasMany(PrimaryOrderProductDeliveryPlan::class, 'po_assigned_product_id');
    }
}
