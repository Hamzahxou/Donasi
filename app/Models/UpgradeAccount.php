<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpgradeAccount extends Model
{
    protected $fillable = [
        'user_id',
        'bank_account_name',
        'bank_account_number',
        'bank_branch_number',
        'phone',
        'upgrade_reason',
        'supporting_documents',
        'is_approved',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
