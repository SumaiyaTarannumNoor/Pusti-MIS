<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $fillable = [
        'division_id',
        'district_name',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];    
    
    public function upazilas()
    {
        return $this->hasMany(Upazila::class);
    } 
    public function division()
    {
        return $this->belongsTo(AdministrativeDivision::class);
    } 

    public function getStatusAttribute($value)
    {
        return $value == 1 ? true : false;
    }
}

