<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

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

        /*static::creating(function ($model) {
            $model->author_id = auth()->user()->id;
        });*/
    }

    public function products()
    {
        return $this->hasMany("Marrs\MarrsCatalog\Models\Product");
    }
}
