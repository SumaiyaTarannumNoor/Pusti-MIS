<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Committee extends Model
{
    protected $fillable = [
        'name',
        'committee_purpose',
        'status',
        'created_by',
        'updated_by',
        'ip',
        'browser',
    ];

    public function committeeMember()
    {
        return $this->hasMany(CommitteeMember::class, 'approval_committee_id');
    }

    public function primaryOrder()
    {
        return $this->hasMany(PrimaryOrder::class, 'assigned_committee_id');
    }
}
