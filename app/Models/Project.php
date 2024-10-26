<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasUuids;
    protected $fillable = [
        'image',
        'title',
        'description',
        'target_amount',
        'content',
        'target_date',
        'collected_amount',
        'is_active',
        'user_id',
        'category_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function donations()
    {
        return $this->hasMany(Donation::class, 'project_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'project_id', 'id');
    }

    public function projectUpdates()
    {
        return $this->hasMany(ProjectUpdate::class, 'project_id', 'id');
    }
}
