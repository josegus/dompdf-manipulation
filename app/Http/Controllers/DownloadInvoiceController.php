<?php

namespace App\Http\Controllers;

use App\Support\Invoice;

class DownloadInvoiceController
{
    public function __invoke()
    {
        return Invoice::download();
    }
}
