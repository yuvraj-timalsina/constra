<?php

namespace App\Models;

use App\Http\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Banner extends Model
{
    use HasFactory;
    use ImageTrait;

    protected $fillable = ['title', 'header', 'short_intro', 'link'];

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope(function (Builder $builder) {

            $builder->orderBy('title', 'ASC');
        });
    }

    /**
     * Delete post image from Storage.
     *
     * @return void
     */
    public function deleteImage()
    {
        Storage::delete($this->image->image);
    }
}
