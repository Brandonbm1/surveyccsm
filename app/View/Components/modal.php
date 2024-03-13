<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class modal extends Component
{
    public $dataTarget;
    public $dataTitle;
    public $dataRoute;
    public $dataId;
    /**
     * Create a new component instance.
     */
    public function __construct($dataTarget, $dataTitle, $dataRoute, $dataId = null)
    {
        $this->dataTarget = $dataTarget;
        $this->dataTitle = $dataTitle;
        $this->dataRoute = $dataRoute;
        $this->dataId = $dataId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.modal');
    }
}
