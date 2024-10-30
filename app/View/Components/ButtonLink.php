<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonLink extends Component
{
    public string $href;
    public string $icon;
    public string $label;

    public function __construct(string $href = '', string $icon, string $label)
    {
        $this->href = $href;
        $this->icon = $icon;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.button-link');
    }
}
