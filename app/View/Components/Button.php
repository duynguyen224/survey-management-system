<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public string $url;
    public string $icon;
    public string $label;

    public function __construct(string $url, string $icon, string $label)
    {
        $this->url = $url;
        $this->icon = $icon;
        $this->label = $label;
    }

    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
