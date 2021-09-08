<?php

namespace Marrs\MarrsCatalog\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Marrs\MarrsCatalog\Models\Product;
use Illuminate\Support\Facades\Artisan;
use Marrs\MarrsAdmin\Models\Menu;
use Marrs\MarrsCatalog\Models\Brand;
use Marrs\MarrsCatalog\Models\Department;

class Install extends Command
{
    protected $signature = 'marrs-catalog:install';

    protected $description = 'instala e configura o pacote marrs-catalog';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $this->warn('1. Criando tabelas');
        Artisan::call('migrate');
        $this->info(Artisan::output());

        $this->warn('2. Criando registros iniciais');
        $this->seeder();

        $this->warn('3. Publicando assets');
        Artisan::call('vendor:publish --tag=marrs-catalog-assets --force');
    }


    public function seeder()
    {
        //menus do modulo
        $blmenu = Menu::create([
            'name' => 'Catalogo',
            'route' => null,
            'icon_class' => 'fas fa-store',
            'type' => 'menu',
            'menu_id' => 1
        ]);
        Menu::insert([
            [
                'name' => 'Departamentos',
                'route' => 'admin.catalog.departments.index',
                'icon_class' => 'fas fa-tags',
                'type' => 'menu',
                'menu_id' => $blmenu->id
            ],
            [
                'name' => 'Produtos',
                'route' => 'admin.catalog.products.index',
                'icon_class' => 'fab fa-product-hunt',
                'type' => 'menu',
                'menu_id' => $blmenu->id
            ],
            [
                'name' => 'Marcas',
                'route' => 'admin.catalog.brands.index',
                'icon_class' => 'fas fa-copyright',
                'type' => 'menu',
                'menu_id' => $blmenu->id
            ]
        ]);

        for ($i = 1; $i <= 3; $i++) {
            Department::create([
                'name' => "Departamento {$i}",
                'slug' => "departamento{$i}"
            ]);
        }

        for ($i = 1; $i <= 3; $i++) {
            Brand::create([
                'name' => "Marca {$i}",
                'slug' => "marca{$i}"
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            Product::create([
                'name' => "Product {$i}",
                'price' => rand(100, 1000),
                'status' => 1,
                //'image' => '/i.picsum.photos/id/1011/5472/3648.jpg?hmac=Koo9845x2akkVzVFX3xxAc9BCkeGYA9VRVfLE4f0Zzk',
                'slug' => "product{$i}",
                'catalog_department_id' => rand(1, 3),
                'enabled' => true,
                'author_id' => 1
            ]);
        }
    }
}
