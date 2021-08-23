<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOption extends Model
{
    use SoftDeletes;

    protected $table = "catalog_product_options";

    protected $fillable = [
        'name',
        'catalog_product_id'
    ];


    public function values()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductOptionValue', 'catalog_product_option_id');
    }
}
