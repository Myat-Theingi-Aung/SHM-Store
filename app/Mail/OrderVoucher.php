<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderVoucher extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $order;
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($user,$order,$cart)
    {
        $this->user = $user;
        $this->order = $order;
        $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('admin.mail.orderVoucher');
    }
}
