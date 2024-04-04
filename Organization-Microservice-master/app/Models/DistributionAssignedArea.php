<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DistributionAssignedArea extends Model
{
    
    protected $fillable = [
        'distributor_id',
        'area_id',
        'created_by',
        'modified_by',
        'modified_at',
        'ip',
        'browser',
    ];

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'distributor_id');
    }
}
