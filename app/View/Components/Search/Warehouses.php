<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Setting\Warehouse;

class Warehouses extends Component
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
        return view('components.search.warehouses',[
            'warehouses' => Warehouse::active()->get(),
        ]);
    }
}
