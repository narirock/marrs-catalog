<?php

namespace Marrs\MarrsCatalog\Views\Components\Products;

use Illuminate\View\Component;

class ProductBlock extends Component
{
    public $product;
    public $lg;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($product, $lg = 4, $btn = '')
    {
        $this->product = $product;
        $this->lg = $lg;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('marrs-catalog::components.products.product-block', ['product' => $this->product, 'lg' => $this->lg]);
    }
}
