<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class SalesOrganization extends Model
{
    protected $fillable = [
        'name',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function bankAccounts()
    {
        return $this->morphMany(BankAccount::class, 'owner');
    }


    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
                
}
