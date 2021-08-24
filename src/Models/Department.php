<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Marrs\MarrsAdmin\Models\Image;

class Department extends Model
{
    use SoftDeletes;

    protected $table = "catalog_departments";

    protected $fillable = [
        "name",
        "description",
        "slug",
        "enable",
        "department_id",
        "excluder_id",
        "author_id",
        "layout_id",
        "hasmenu",
        "listalls",
        "card"
    ];

    public static  function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->author_id = auth()->check() ? auth()->user()->id : null;
        });

        static::deleting(function ($model) {
            $model->excluder_id = auth()->check() ? auth()->user()->id : null;
            $model->save();
        });
    }

    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function department()
    {
        return $this->belongsTo("Marrs\MarrsCatalog\Models\Department");
    }
    public function childs()
    {
        return $this->hasMany("Marrs\MarrsCatalog\Models\Department");
    }

    public function products()
    {
        return $this->belongsToMany('Marrs\MarrsCatalog\Models\Product', 'Marrs\MarrsCatalog\Models\ProductDepartment');
    }
}
