<?php

namespace App\View\Components\FormControls;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Checkbox extends Component
{
    public string $id;
    public string $extraClass;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id, string $extraClass = '')
    {
        $this->id = $id;
        $this->extraClass = $extraClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form-controls.checkbox');
    }
}
