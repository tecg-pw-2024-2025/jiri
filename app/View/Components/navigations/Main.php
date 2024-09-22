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
        public string $title = 'Main Navigation'
    ) {
        $this->links = [
            ['url' => '/jiris', 'title' => 'Jiris'],
            ['url' => '/contacts', 'title' => 'Contacts'],
            ['url' => '/projects', 'title' => 'Projects'],
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
