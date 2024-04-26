<?php

namespace App\View\Components\Lodging;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Lodging extends Component
{

    public $lodgingDatas;
    /**
     * Create a new component instance.
     */
    public function __construct($lodgingDatas)
    {
        $this->lodgingDatas = $lodgingDatas;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.lodging.lodging');
    }
}
