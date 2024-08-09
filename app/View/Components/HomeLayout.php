<?php

namespace App\View\Components;

use App\Models\Setting;
use Illuminate\View\View;
use App\Models\Page;
use Illuminate\View\Component;

class HomeLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        $settings = Setting::get();
        $pages = Page::get();
        return view('layouts.home', compact('settings', 'pages'));
    }
}
