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
            'success' => 'bg-green-200 text-green-800 border-green-600',
            'warning' => 'bg-yellow-200 text-yellow-800 border-yellow-600',
            'error'  => 'bg-red-200 text-red-800 border-red-600',
            default   => 'bg-blue-200 text-blue-800 border-blue-600',
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
