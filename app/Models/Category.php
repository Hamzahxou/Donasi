<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'name',
        'user_id'
    ];
    public $timestamps = false;
    public function projects()
    {
        return $this->hasMany(Project::class, 'category_id', 'id');
    }
}
