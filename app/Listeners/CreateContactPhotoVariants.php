<?php

namespace App\Listeners;

use App\Concerns\HasImageVariants;
use App\Events\ContactPhotoStored;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateContactPhotoVariants implements ShouldQueue
{
    use HasImageVariants;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactPhotoStored $event): void
    {
        $this->makeImageVariants($event->validated['photo']);
    }
}
