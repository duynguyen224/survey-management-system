<?php

namespace App\View\Components\DateRangePicker;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SingleDatePicker extends Component
{
    public string $id;
    public string $name;
    public string $value;
    public string $extraClass;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id = '', string $name = '', string $value = '', string $extraClass = '')
    {
        $this->id = $id;
        $this->name = $name;
        $this->value = $value;
        $this->extraClass = $extraClass;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.date-range-picker.single-date-picker');
    }
}
