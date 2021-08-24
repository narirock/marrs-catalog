<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Marrs\MarrsAdmin\Models\Image;

class Brand extends Model
{
    use SoftDeletes;

    protected $table = "catalog_brands";

    protected $fillable = [
        'description',
        'logo',
        'author_id',
        'excluder_id',
    ];

    public static  function boot()
    {
        parent::boot();
    }


    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function products()
    {
        return $this->hasMany("Marrs\MarrsCatalog\Models\Product");
    }
}
