<?php

namespace Marrs\MarrsCatalog\Console\Commands;

use Illuminate\Support\Str;
use Illuminate\Console\Command;
use Marrs\MarrsCatalog\Models\Product;
use Marrs\MarrsCatalog\Models\Department;
use Illuminate\Support\Facades\Artisan;
use Marrs\MarrsAdmin\Models\Menu;
use Marrs\MarrsCatalog\Http\Requests\ProductRequest;

class Remove extends Command
{
    protected $signature = 'marrs-catalog:remove';

    protected $description = 'desinstala o pacote marrs-catalog';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        /*$this->warn('1. removendo tabelas');
        Artisan::call('migrate:rollback --path=marrs-catalog::database/migrations');
        $this->info(Artisan::output());

        $this->warn('2. removendo menus');*/
        $this->seeder();
    }


    public function seeder()
    {
        Menu::where('name', 'Catalog')->delete();
        Menu::wherein('route', ['admin.catalog.categories.index', 'admin.catalog.products.index'])->delete();
        Product::where('publish', '2020-01-01')->where('slug', 'LIKE', 'product%')->delete();
    }
}
