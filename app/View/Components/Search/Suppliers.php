<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use App\Models\Contact\Contact;
use Illuminate\Contracts\View\View;

class Suppliers extends Component
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
        return view('components.search.suppliers',[
            'suppliers' => Contact::active()->where('type','2')->limit(10)->get()
        ]);
    }
}
