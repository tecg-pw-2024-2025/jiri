<?php

namespace App\Listeners;

use App\Concerns\HasImageVariants;
use App\Events\ContactPhotoStored;

class CreateContactPhotoVariants
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
