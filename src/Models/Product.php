<?php

namespace Marrs\MarrsCatalog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Marrs\MarrsAdmin\Models\Image;
use Marrs\MarrsCatalog\Traits\Options;

class Product extends Model
{
    use HasFactory, Options;

    protected $table = "catalog_products";

    protected $fillable = [
        'name',
        'description',
        'ano',
        'slug',
        'model',
        'tags',
        'minimum',
        'quantity',
        'shipping',
        'length',
        'width',
        'height',
        'length_class_id',
        'weight',
        'weight_class_id',
        'status',
        'price',
        'enabled',
        'brand_id',
        'makeupdays',
        'show_if_out',
        'full_description',
        'key_words'
    ];

    // public function images()
    // {
    //     return $this->hasMany('Marrs\MarrsCatalog\Models\ProductImage', 'catalog_product_id')->orderby('position');
    // }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable')->orderby('order');
    }

    public function isFavorite()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\CustomerFavorite', 'product_id')->where("customer_id", auth('customer')->user()->id);
    }

    public function promotions()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductPromotion', 'catalog_product_id');
    }

    public function relateds()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductRelated', 'catalog_product_id');
    }

    public function departments()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductDepartment', 'catalog_product_id');
    }

    public function departmentsList()
    {
        return $this->belongsToMany('Marrs\MarrsCatalog\Models\Department', 'Marrs\MarrsCatalog\Models\ProductDepartment');
    }

    public function options()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductOption', 'catalog_product_id');
    }

    public function brand()
    {
        return $this->belongsTo('Marrs\MarrsCatalog\Models\Brand');
    }

    public function  details()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductDetails', 'catalog_product_id');
    }

    public function productsRelateds()
    {
        return $this->belongsToMany('Marrs\MarrsCatalog\Models\Product', 'Marrs\MarrsCatalog\Models\ProductRelated', 'product_id', 'related_id');
    }

    public function access()
    {
        return $this->hasMany('Marrs\MarrsCatalog\Models\ProductRead', 'catalog_product_id');
    }

    public function promo()
    {
        return $this->hasOne('Marrs\MarrsCatalog\Models\ProductPromotion', 'catalog_product_id')->where('start', '<=', date('Y-m-d'))->where('end', '>=', date('Y-m-d'))->limit(1);
    }
}
