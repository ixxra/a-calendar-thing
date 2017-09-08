<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventEdited extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user, $event, $action)
    {
        $this->user = $user;
        $this->event = $event;
        $this->action = $action;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('prof.renegarcia@gmail.com')
            ->subject('Cambios en el calendario')
            ->view('emails.send')
            ->with([
                'user' => $this->user,
                'event' => $this->event,
                'action' => $this->action
            ]);
    }
}
