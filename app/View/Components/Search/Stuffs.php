<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use App\Models\Contact\Contact;
use Illuminate\Contracts\View\View;

class Stuffs extends Component
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
        return view('components.search.stuffs',[
            'stuffs' => Contact::active()->where('type','4')->limit(10)->get()
        ]);
    }
}
