<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;

class ProductDetails extends Model
{
    protected $table = "catalog_product_details";
    protected $fillable = [
        'field',
        'description',
        'catalog_product_id'
    ];
}
