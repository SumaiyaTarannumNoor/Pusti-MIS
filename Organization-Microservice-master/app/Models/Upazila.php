<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upazila extends Model
{
    protected $fillable = [
        'district_id',
        'upazila_name',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function district()
    {
        return $this->belongsTo(District::class);
    }    
    
    public function distributor(){
        return $this->hasmany(Distributor::class);
    }

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}
