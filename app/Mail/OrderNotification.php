<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $products;
    public $totalAmount;
    public $userEmail;

    public function __construct($products, $totalAmount, $email)
    {
        $this->products = $products;
        $this->totalAmount = $totalAmount;
        $this->userEmail = $email;
    }

    public function build()
    {
        return $this->view('order');
    }
}
