<?php

namespace App\Models;

use App\Http\Traits\Image;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    use Image;

    protected static function boot()
    {
        parent::boot();

        self::addGlobalScope(function (Builder $builder) {

            $builder->orderBy('sub_header', 'ASC');
        });
    }
}
