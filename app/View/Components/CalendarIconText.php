<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CalendarIconText extends Component
{
    public string $text;

    public function __construct(string $text)
    {
        $this->text = $text;
    }

    public function render(): View|Closure|string
    {
        return view('components.calendar-icon-text');
    }
}
