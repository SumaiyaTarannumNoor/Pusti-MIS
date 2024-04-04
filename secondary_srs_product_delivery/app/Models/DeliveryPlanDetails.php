<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryPlanDetails extends Model
{
    protected $fillable = [
        'delivery_plan_id',
        'product_sku',
        'planned_quantity',
        'delivered_by',
        'planned_delivery_date',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser',
    ];    
    
    public function secondaryOrderPlan()
    {
        return $this->belongsTo(SecondaryOrderDeliveryPlan::class);
    } 

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}
