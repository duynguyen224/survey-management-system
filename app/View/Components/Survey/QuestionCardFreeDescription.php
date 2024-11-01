<?php

namespace App\View\Components\Survey;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionCardFreeDescription extends QuestionCard
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.survey.question-card-free-description');
    }
}
