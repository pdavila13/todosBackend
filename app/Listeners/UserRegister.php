<?php

namespace PaoloDavila\TodosBackend\Listeners;

use PaoloDavila\TodosBackend\Events\Register;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UserRegister
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Register  $event
     * @return void
     */
    public function handle(Register $event)
    {
        $event->user->assignRole('admin');
    }
}
