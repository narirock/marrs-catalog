<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use SoftDeletes;
    protected $table = "catalog_product_images";
    protected $fillable = [
        'url',
        'position',
        'catalog_product_id',
    ];

    public static  function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->author_id = @auth()->user()->id > 0 ? auth()->user()->id : 1;
        });

        static::deleting(function ($model) {
            $model->excluder_id = auth()->user()->id;
            $model->save();
        });
    }
}
