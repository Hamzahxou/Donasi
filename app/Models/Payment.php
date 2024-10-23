<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'payment_method',
        'image',
        'message',
        'donation_id',
    ];

    public function donation()
    {
        return $this->belongsTo(Donation::class, 'donation_id', 'id');
    }
}
