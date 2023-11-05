<?php

namespace App\Pages\Backend\Setting;

use Livewire\Component;
use Livewire\Attributes\Layout;


#[Layout('layouts.backend')]
class MultiplePaymentDetails extends Component
{
    public $payment_id;
    public function render()
    {
        return view('pages.backend.setting.multiple-payment-details');
    }
}
