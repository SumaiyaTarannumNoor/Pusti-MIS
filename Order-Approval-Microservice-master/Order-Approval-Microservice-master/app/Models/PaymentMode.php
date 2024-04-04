<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentMode extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by',
        'deleted_by',
        'deleted_at',
        'ip',
        'browser',
    ];

    protected $dates = ['deleted_at'];

    public function plannedPaymentDetails()
    {
        return $this->hasMany(PlannedPaymentDetails::class);
    }


}
