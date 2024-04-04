<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondaryOrderDeliveryPlan extends Model
{
    protected $fillable = [
        'plan_title',
        'secondary_order_id',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser',
    ];    
    
    public function deliveryPlan()
    {
        return $this->hasMany(DeliveryPlanDetails::class);
    } 

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}
