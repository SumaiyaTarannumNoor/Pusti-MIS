<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $fillable = [
        'name',
        'description',
        'contact_person',
        'contact_person_mobile',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser',
    ];

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }

    public function bank_accounts()
    {
        return $this->hasMany(BankAccount::class);
    } 
}
