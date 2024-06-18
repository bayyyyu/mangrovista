<?php

namespace App\View\Components\layout\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class MenuItem extends Component
{
    /**
     * Create a new component instance.
     */
    public $icon;
    public $label;
    public $url;
    public function __construct($icon = null, $label = null, $url = null)
    {
        $this->label=$label;
        $this->icon=$icon;
        $this->url=url($url);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.layout.sidebar.menu-item');
    }
}
