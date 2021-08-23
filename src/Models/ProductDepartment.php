<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductDepartment extends Model
{
    protected $table = "catalog_product_departments";

    protected $fillable = [
        'catalog_product_id',
        'catalog_department_id'
    ];

    public function department()
    {
        return $this->belongsTo('Marrs\MarrsCatalog\Models\Department', 'catalog_department_id');
    }
}
