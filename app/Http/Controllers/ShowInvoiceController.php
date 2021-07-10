<?php

namespace App\Http\Controllers;

use App\Support\Invoice;

class ShowInvoiceController
{
    public function __invoke()
    {
        return view('invoice', Invoice::attributes());
    }
}
