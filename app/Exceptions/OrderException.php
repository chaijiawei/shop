<?php

namespace App\Exceptions;

use Exception;

class OrderException extends Exception
{
    public function render()
    {
        return view('orders.error', ['msg' => $this->getMessage()]);
    }
}
