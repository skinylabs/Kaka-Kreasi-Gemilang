<?php

namespace App\View\Components\pages\tour;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class rundown extends Component
{
    public $tour;
    public $rundown;
    /**
     * Create a new component instance.
     */
    public function __construct($tour, $rundown)
    {
        $this->tour = $tour;
        $this->rundown = $rundown;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.tour.rundown');
    }
}
