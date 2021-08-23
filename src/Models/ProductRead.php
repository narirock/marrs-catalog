<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;

class ProductRead extends Model
{
    protected $table = "catalog_product_reads";
    protected $fillable = ['product_id', 'ip'];

    public function products()
    {
        return $this->belongsTo('Marrs\MarrsCatalog\Models\Product');
    }
}
