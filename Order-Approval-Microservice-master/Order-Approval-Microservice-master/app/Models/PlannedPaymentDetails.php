<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannedPaymentDetails extends Model
{
    protected $fillable = [
        'payment_mode_id',
        'payable_amount',
        'order_id',
        'payment_date',
        'attached_file_name',
        'bank_id',
        'bank_account_number',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function paymentMode()
    {
        return $this->belongsTo(PaymentMode::class, 'payment_mode_id');
    }

    public function primaryOrder()
    {
        return $this->belongsTo(PrimaryOrder::class, 'order_id');
    }

}
