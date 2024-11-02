<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;

class ContactsList extends Component
{
    #[Url]
    public $filter = '';

    #[Computed]
    public function contacts()
    {
        return Auth::user()
            ?->contacts()
            ->where(function ($query) {
                $query->where('first_name', 'like', "%{$this->filter}%")
                    ->orWhere('last_name', 'like', "%{$this->filter}%");
            })->orderBy('last_name')
            ->get();
    }

    public function filter(): void {}
}
