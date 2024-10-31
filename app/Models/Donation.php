<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donation extends Model
{
    use SoftDeletes;
    protected $fillable = [
        'bank_account_name',
        'amount',
        'payment_method',
        'is_verified',
        'image',
        'message',
        'user_id',
        'project_id',
    ];

    public function setAmountAttribute($value)
    {
        $this->attributes['amount'] = str_replace('.', '', $value);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
