<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ButtonModal extends Component
{
    public string $id;
    public string $icon;
    public string $label;
    public string $modalId;

    public function __construct(string $id, string $icon, string $label, string $modalId)
    {
        $this->id = $id;
        $this->icon = $icon;
        $this->label = $label;
        $this->modalId = $modalId;
    }

    public function render(): View|Closure|string
    {
        return view('components.button-modal');
    }
}