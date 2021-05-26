<?php

namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    private $username,$email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        if (Auth::check()) {
            $this->username = Auth::user()->name;
            $this->email = Auth::user()->email;
        }
        else{
            $this->username = "NoName";
            $this->email = "NoMail";
        }
        //$this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->subject ('Obrigado por escoler a 88Pasteis');
        $this->to( $this->email, $this->username);
        return $this->markdown('mail.NewOrder', ['name' =>$this->username, 'email'=>$this->email]);
    }
}
