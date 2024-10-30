<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonIcon extends Component
{
    public string $id;
    public string $icon;
    public string $label;
    public string $extraClass;

    public function __construct(string $id = '', string $icon = '', string $label = '', string $extraClass = '')
    {
        $this->id = $id;
        $this->icon = $icon;
        $this->label = $label;
        $this->extraClass = $extraClass;
    }

    public function render(): View|Closure|string
    {
        return view('components.button-icon');
    }
}
