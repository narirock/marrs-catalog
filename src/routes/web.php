<?php

use Illuminate\Support\Facades\Route;
//'middleware' => 'webadmin',

//verificando se rota é protegida;
$guard[] = 'web';
if (config('marrs-catalog.guard') != "") {
    $guard[] = config('marrs-catalog.guard');
}




Route::group(
    ['prefix' => 'admin/catalog', 'middleware' => $guard],
    function () {
        Route::resource('departments', 'Marrs\MarrsCatalog\Http\Controllers\Admin\DepartmentController', ['as' => 'admin.catalog']);
        Route::resource('products', 'Marrs\MarrsCatalog\Http\Controllers\Admin\ProductController', ['as' => 'admin.catalog']);
        Route::resource('brands', 'Marrs\MarrsCatalog\Http\Controllers\Admin\BrandController', ['as' => 'admin.catalog']);
        Route::get('/products/copy/{id}', 'Marrs\MarrsCatalog\Http\Controllers\Admin\ProductController@copy');
    }
);


Route::group(['prefix' => 'catalog', 'middleware' => ['web']], function () {
    Route::get('/', 'Marrs\MarrsCatalog\Http\Controllers\Front\CatalogController@index')->name('catalog.index');
    Route::get('/product/{slug}', 'Marrs\MarrsCatalog\Http\Controllers\Front\CatalogController@product')->name('catalog.product');
});
