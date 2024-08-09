<?php

namespace App\Listeners;

use App\Events\UserOnline;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateUserOnlineStatus
{
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
    public function handle(UserOnline $event): void
    {
        $event->user->update(['last_online_at' => now()]);
    }
}
