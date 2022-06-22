<?php

namespace App\Listeners;

use App\Events\PaymentStatusChanged;
use App\Notifications\PaymentCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Notification;

class SendPaymentEmailNotification implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  \App\Events\PaymentStatusChanged  $event
     * @return void
     */
    public function handle(PaymentStatusChanged $event)
    {
        if ($event->payment->status === "Completed") {
            $assistants = $event->payment->assistants;
            foreach ($assistants as $value) {
                Notification::route('mail', $value->email)
                    ->notify(new PaymentCompleted($event->payment));
            }
        }
    }
}
