<?php

namespace App\View\Components\Survey;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class QuestionCard extends Component
{
    public string $id;
    public string $extraClass;
    public string $questionId;
    public string $questionType;
    public string $questionNumber;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id = '', string $extraClass = '', string $questionId = '', string $questionType = '', string $questionNumber = '')
    {
        $this->id = $id;
        $this->extraClass = $extraClass;
        $this->questionId = $questionId;
        $this->questionType = $questionType;
        $this->questionNumber = $questionNumber;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.survey.question-card');
    }
}
