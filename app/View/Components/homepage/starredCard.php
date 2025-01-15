<?php

namespace App\View\Components\homepage;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class starredCard extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $property
    )
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.homepage.starred-card');
    }
}
