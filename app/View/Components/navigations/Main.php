<?php

namespace App\View\Components\navigations;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Main extends Component
{


    /**
     * Create a new component instance.
     */
    public function __construct(
        public array $links = [],
        public string $title = ''
    ) {
        $this->title = 'main navigation';
        $this->links = [
            ['url' => route('jiris.index'), 'title' => 'jiris'],
        ];
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigations.main');
    }
}
