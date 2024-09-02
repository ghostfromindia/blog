<?php

namespace App\View\Components\Backend;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Select2 extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public string $label,
        public string $name,
        public string $url,
        public bool $multiple = false,
    ){}

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.backend.select2');
    }
}
