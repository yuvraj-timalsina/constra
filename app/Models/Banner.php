<?php

namespace App\Models;

use App\Http\Traits\ImageTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    use ImageTrait;

    protected $fillable = ['sub_header', 'header', 'short_intro', 'link'];

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope(function (Builder $builder) {

            $builder->orderBy('sub_header', 'ASC');
        });
    }
}
