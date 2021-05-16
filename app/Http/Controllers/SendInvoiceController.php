<?php

namespace App\Http\Controllers;

use App\Support\Invoice;
use App\Notifications\InvoiceNotification;
use Illuminate\Support\Facades\Notification;

class SendInvoiceController
{
    public function __invoke()
    {
        //$binary = Invoice::outputAsBinary();

        $filename = Invoice::filename();

        Notification::route('mail', 'customer@example.test')
            ->notify(new InvoiceNotification($filename));

        return back();
    }
}
