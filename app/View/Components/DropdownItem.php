<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class DropdownItem extends Component
{
    public string $id;
    public string $class;
    public string $icon;
    public string $label;
    public string $href;

    public function __construct(string $id, string $class, string $icon, string $label, string $href='')
    {
        $this->id = $id;
        $this->class = $class;
        $this->icon = $icon;
        $this->label = $label;
        $this->href = $href;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.dropdown-item');
    }
}
