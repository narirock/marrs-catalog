<?php

namespace Marrs\MarrsCatalog\Views\Components\Department;

use Marrs\MarrsCatalog\Models\Department;
use Illuminate\View\Component;

class Widget extends Component
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
        return view('marrs-catalog::components.categories.widget', ['categories' => Department::get()]);
    }
}
