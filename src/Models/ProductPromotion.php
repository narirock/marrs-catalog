<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductPromotion extends Model
{
    use SoftDeletes;
    protected $table = "catalog_product_promotions";
    protected $fillable = [
        'client_type_id',
        'price',
        'start',
        'end',
        'catalog_product_id'
    ];
}
