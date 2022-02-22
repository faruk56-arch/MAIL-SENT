<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class TestMail extends Mailable
{
    use Queueable, SerializesModels;
    private $name, $email, $password, $ouath;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $email, $password, $ouath)
    {
        $this->name = $name;
        $this->email = $email;
        $this->password = $password;
        $this->ouath = $ouath;
    }
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('farukmomin409@gmail.com')
            ->subject('My test Mail')
            ->view(
                'emails.test',
                [
                    'name' => $this->name,
                    'email' => $this->email,
                    'password' => $this->password,
                    'oauth' => $this->ouath
                ]
            );
    }
}
