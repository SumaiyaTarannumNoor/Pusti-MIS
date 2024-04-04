<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupplierType extends Model
{

    protected $fillable = [
        'supplier_type_name',
        'status',
        'created_by',
        'modified_by',
        'ip',
        'browser'
    ];

    public function stock()
    {
        return $this->hasMany(Stock::class);
    }
}


