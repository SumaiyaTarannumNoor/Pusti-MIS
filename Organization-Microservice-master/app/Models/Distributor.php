<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
    protected $fillable = [
        'name',
        // 'storage_id',
        // 'upazila_id',
        'distributor_type',
        'division_id',
        'region_id',
        'area_id',
        'erp_id',
        'proprietor_name',
        'proprietor_dob',
        'address',
        'mobile_number',
        'has_printer',
        'has_pc',
        'has_live_app',
        'has_direct_sale',
        'has_storage',
        'opening_date',
        'emergency_contact_name',
        'emergency_contact_number',
        'emergency_contact_relation',
        'union',
        'ward',
        'village',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }

    public function upazila()
    {
        return $this->belongsTo(Upazila::class);
    }

    public function daa()
    {
        return $this->hasMany(DistributionAssignedArea::class);
    }
    
    public function bankAccounts()
    {
        return $this->morphMany(BankAccount::class, 'owner');
    }
    
    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }

  
}