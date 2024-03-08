<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class modal extends Component
{
    public $dataTarget;
    public $dataTitle;
    /**
     * Create a new component instance.
     */
    public function __construct($dataTarget, $dataTitle)
    {
        $this->dataTarget = $dataTarget;
        $this->dataTitle = $dataTitle;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
