<?php

namespace App\View\Components\Layouts;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Setting;

class Backend extends Component
{
    public function __construct() {}

    public function render(): View|Closure|string
    {

        // $setting = Setting::get()->first();
        $setting = 'ONM';

        return view('layouts.backend', compact('setting'), [
            'layout_type' => 'vertical',
            'user' => auth()->user(),

        ]); // vertical, horizontal
    }
}