<?php

namespace App\View\Components\Tables;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BaseTable extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct(
        public $header,
        public $thead,
    )
    {

    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.tables.base-table');
    }
}
