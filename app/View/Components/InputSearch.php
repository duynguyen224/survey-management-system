<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class InputSearch extends Component
{
    public string $id;
    public string $name;
    public string $placeholder;

    public function __construct(string $id, string $name, string $placeholder)
    {
        $this->id = $id;
        $this->name = $name;
        $this->placeholder = $placeholder;
    }

    public function render(): View|Closure|string
    {
        return view('components.input-search');
    }
}
