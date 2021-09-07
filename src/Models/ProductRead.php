<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRead extends Model
{
    protected $table = "catalog_product_reads";
    protected $fillable = ['catalog_product_id', 'ip'];

    public function products()
    {
        return $this->hasOne('Marrs\MarrsCatalog\Models\Product', 'catalog_product_id');
    }
}
