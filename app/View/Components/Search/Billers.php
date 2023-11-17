<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use App\Models\Contact\Contact;
use Illuminate\Contracts\View\View;

class Billers extends Component
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
        return view('components.search.billers',[
            'billers' => Contact::active()->limit(10)->get()
        ]);
    }
}
