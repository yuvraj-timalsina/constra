<?php
namespace App\Http\Traits;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait Image {

    public function image():MorphOne {
        return $this->morphOne(Image::class);
    }

    public function images():MorphMany {
        return $this->morphMany(Image::class);
    }
}
