<?php

namespace App\View\Components\Layouts\Backend;

use Illuminate\View\Component;

class Card extends Component
{
    public function __construct()
    {
        //
    }

    public function render()
    {
        return view('layouts.backend.card');
    }
}