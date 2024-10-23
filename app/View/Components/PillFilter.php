<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PillFilter extends Component
{
    public string $href;
    public bool $isActive;
    public string $label;

    public function __construct(string $href, bool $isActive, string $label)
    {
        $this->href = $href;;
        $this->isActive = $isActive;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.pill-filter');
    }
}
