<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'short_intro',
        'client',
        'architect',
        'location',
        'size',
        'completion_year',
    ];

    /**
     * The categories that belong to the project.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
