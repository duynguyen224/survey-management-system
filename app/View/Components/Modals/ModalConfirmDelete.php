<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalConfirmDelete extends Component
{
    public string $warningMessage;

    /**
     * Create a new component instance.
     */
    public function __construct(string $warningMessage)
    {
        $this->warningMessage = $warningMessage;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.modal-confirm-delete');
    }
}