<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;

class SendMobileVerificationNotification
{
    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Registered  $event
     */
    public function handle(Registered $event)
    {
        if ($event->user instanceof MustVerifyMobile && ! $event->user->hasVerifiedMobile()) {
            $event->user->sendMobileVerificationNotification();
        }
    }
}
