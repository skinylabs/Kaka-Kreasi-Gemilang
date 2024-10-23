<?php

namespace App\View\Components\ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class sidebarDivider extends Component
{

    public $text;
    /**
     * Create a new component instance.
     */
    public function __construct($text = 'Divider Text')
    {
        $this->text = $text;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.ui.sidebar-divider');
    }
}
