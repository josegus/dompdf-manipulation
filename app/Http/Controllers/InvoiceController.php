<?php

namespace App\Http\Controllers;

use App\Support\Invoice;

class InvoiceController
{
    public function __invoke()
    {
        return view('invoice', Invoice::viewAttributes());
    }
}
