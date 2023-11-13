<?php

namespace App\View\Components\Search;

use Closure;
use App\Models\Product\Brand;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Brands extends Component
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
        return view('components.search.brands',[
            'brands' => Brand::active()->get()
        ]);
    }
}
