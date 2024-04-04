<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommitteeMember extends Model
{
    protected $fillable = [
        'approval_committee_id',
        'employee_id',
        'sequence_number',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function committee()
    {
        return $this->belongsTo(Committee::class);
    }
}
