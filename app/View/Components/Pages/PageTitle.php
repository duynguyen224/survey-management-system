<?php

namespace App\View\Components\Pages;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class PageTitle extends Component
{
    public string $title;
    public string $extraClass;

    public function __construct(string $title, string $extraClass = "")
    {
        $this->title = $title;
        $this->extraClass = $extraClass;
    }

    public function render(): View|Closure|string
    {
        return view('components.pages.page-title');
    }
}
