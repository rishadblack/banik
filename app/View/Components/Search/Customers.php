<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use App\Models\Contact\Contact;
use Illuminate\Contracts\View\View;

class Customers extends Component
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
        return view('components.search.customers',[
            'customers' => Contact::limit(10)->get()
        ]);
    }
}
