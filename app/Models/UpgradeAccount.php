<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UpgradeAccount extends Model
{
    protected $fillable = [
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
