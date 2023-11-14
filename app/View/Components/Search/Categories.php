<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use App\Models\Product\Category;
use Illuminate\Contracts\View\View;

class Categories extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.search.categories',[
            'categories' => Category::active()->get()
        ]);
    }
}
