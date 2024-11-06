<?php

namespace App\View\Components\Modals;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ModalErrorMessage extends Component
{
    public string $id;

    /**
     * Create a new component instance.
     */
    public function __construct(string $id = 'modalErrorMessage')
    {
        $this->id = $id;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modals.modal-error-message');
    }
}