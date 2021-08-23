<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOptionValue extends Model
{
    use SoftDeletes;

    protected $table = "catalog_product_option_values";

    protected $fillable = [
        'quantity',
        'reduce',
        'value',
        'price',
        'points',
        'weight',
        'catalog_product_option_id'
    ];

    public function option()
    {
        return $this->belongsTo("Marrs\MarrsCatalog\Models\ProductOption", "catalog_product_option_id");
    }
}
