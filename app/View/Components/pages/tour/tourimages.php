<?php

namespace App\View\Components\pages\tour;

use App\Models\Tour;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class tourimages extends Component
{
    public $tour;
    /**
     * Create a new component instance.
     */
    public function __construct(Tour $tour)
    {
        $this->tour = $tour;
    }


    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.pages.tour.tourimages');
    }
}
