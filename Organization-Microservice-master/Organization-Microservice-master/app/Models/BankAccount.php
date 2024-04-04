<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class BankAccount extends Model
{
    protected $fillable = [
        'bank_id',
        'owner_type',
        'owner_id',
        'bank_account_number',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function bank()
    {
        return $this->belongsTo(Bank::class);
    }

    public function owner()
    {
        return $this->morphTo();
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}
