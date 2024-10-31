<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalCreateOrUpdate extends Component
{
    public string $modalId;
    public string $formId;
    public string $labelSubmit;

    /**
     * Create a new component instance.
     */
    public function __construct(string $modalId, string $formId, string $labelSubmit)
    {
        $this->modalId = $modalId;
        $this->formId = $formId;
        $this->labelSubmit = $labelSubmit;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.modal-create-or-update');
    }
}
