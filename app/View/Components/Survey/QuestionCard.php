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
    public string $questionNumber;
    public string $questionTitle;
    public string $questionDescription;
    public string $questionType;


    /**
     * Create a new component instance.
     */
    public function __construct(
        string $id = '',
        string $extraClass = '',
        string $questionId = '',
        string $questionNumber = '',
        string $questionTitle = '',
        string $questionDescription = '',
        string $questionType = ''
    ) {
        $this->id = $id;
        $this->extraClass = $extraClass;
        $this->questionId = $questionId;
        $this->questionNumber = $questionNumber;
        $this->questionTitle = $questionTitle;
        $this->questionDescription = $questionDescription;
        $this->questionType = $questionType;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.survey.question-card');
    }
}
