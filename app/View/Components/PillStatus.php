<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PillStatus extends Component
{
    public string $colorClass;
    public string $label;

    public function __construct(string $colorClass, string $label)
    {
        $this->colorClass = $colorClass;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.pill-status');
    }
}
