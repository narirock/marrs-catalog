<?php

namespace Marrs\MarrsCatalog\Views\Components\Products;

use Marrs\MarrsCatalog\Models\Product;
use Illuminate\View\Component;

class LastRow extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('marrs-catalog::components.products.last-row', ['products' => Product::with('category')->orderby('created_at', 'desc')->limit(3)->get()]);
    }
}
