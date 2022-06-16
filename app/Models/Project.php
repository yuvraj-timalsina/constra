<?php

namespace App\Models;

use App\Http\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    use ImageTrait;

    protected $fillable = [
        'title',
        'slug',
        'short_intro',
        'client',
        'architect',
        'location',
        'size',
        'category_id',
        'completion_year',
    ];

    /**
     * The categories that belong to the project.
     */
    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * Return name in array.
     *
     * @param [type] $name
     * @return boolean
     */
    public function hasCategory($title)
    {
        return in_array($title, $this->categories->pluck('title')->toArray());
    }
}
