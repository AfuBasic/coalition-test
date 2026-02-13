<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class alert extends Component
{
    public string $classes;
    /**
     * Create a new component instance.
     */
    public function __construct(public string $type = 'info')
    {
        $this->classes = match ($type) {
            'success' => 'bg-green-50 text-green-800 border-green-200',
            'warning' => 'bg-amber-50 text-amber-900 border-amber-200',
            'danger'  => 'bg-red-50 text-red-800 border-red-200',
            default   => 'bg-blue-50 text-blue-800 border-blue-200',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.alert');
    }
}
