<?php

namespace App\View\Components\Search;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use App\Models\Setting\PaymentMethod;

class PaymentMethods extends Component
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
        return view('components.search.payment-methods',[
            'paymentMethods' => PaymentMethod::active()->get(),
        ]);
    }
}
