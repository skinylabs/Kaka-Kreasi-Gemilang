<?php

namespace App\View\Components;

use App\Models\Link;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FrontendLayout extends Component
{
    public $contact;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->contact = Link::all();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('layouts.frontend');
    }
}
