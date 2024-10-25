<?php

namespace App\View\Components\pages\tour;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class transportations extends Component
{
    public $tour;
    public $transportation;
    /**
     * Create a new component instance.
     */
    public function __construct($tour, $transportation)
    {
        $this->tour = $tour;
        $this->transportation = $transportation;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.tour.transportations');
    }
}
