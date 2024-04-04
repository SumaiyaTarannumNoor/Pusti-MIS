<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PrimaryOrder extends Model
{
    protected $fillable = [
        'title',
        'has_delivery_approval',
        'is_delivery_approval_approved',
        'distributor_id',
        'assigned_committee_id',
        'current_approver',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function committee()
    {
        return $this->belongsTo(Committee::class, 'assigned_committee_id');
    }

    public function primaryOrderProductDetails()
    {
        return $this->hasMany(primaryOrderProductDetails::class);
    }
}
