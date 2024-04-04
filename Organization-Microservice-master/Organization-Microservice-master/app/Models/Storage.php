<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Storage extends Model
{
    protected $fillable = [
        'owner_id',
        'type_id',
        'name',
        'address',
        'person_in_charge',
        'email',
        'telephone',
        'mobile',
        'status',
        'created_by',
        'modified_by',
        'modified_at',
        'ip',
        'browser',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function type()
    {
        return $this->belongsTo(StorageType::class, 'type_id');
    }     
    
    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}
