<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class confirmEmail extends Mailable
{
    use Queueable, SerializesModels;
    public $cart;
    public $price;
    public $name;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart, $price, $name)
    {
        $this->cart = $cart;
        $this->price = $price;
        $this->name = $name;
    }
    /**
     * Build the message.
     *
     * @return public $this
     */
    public function build()
    {
        return $this->view('mail.confirmEmail');
    }
}
