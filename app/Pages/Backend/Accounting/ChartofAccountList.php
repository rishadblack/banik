<?php

namespace App\Pages\Backend\Accounting;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.backend')]
class ChartofAccountList extends Component
{
    public function render()
    {
        return view('pages.backend.accounting.chartof-account-list');
    }
}
