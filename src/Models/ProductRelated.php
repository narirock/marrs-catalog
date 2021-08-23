<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductRelated extends Model
{
    protected $table = "catalog_product_related";
    protected $fillable = [
        'catalog_product_id',
        'related_id'
    ];
}
