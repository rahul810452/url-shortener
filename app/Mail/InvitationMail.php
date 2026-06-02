<?php

namespace App\Mail;

use App\Models\Invitation;
use Illuminate\Mail\Mailable;

class InvitationMail extends Mailable
{
    public $invitation;

    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    public function build()
    {
        return $this
            ->subject('Company Invitation')
            ->view('emails.invitation');
    }
}
