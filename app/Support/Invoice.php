<?php

namespace App\Support;

use Barryvdh\DomPDF\Facade as DomPDF;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class Invoice
{
    public static function products()
    {
        return collect([
            new Product('Web design', 500.45, 1),
            new Product('Hosting (three months)', 1500.48, 3),
            new Product('Domain name (site-a.test, site-b.test)', 50.32, 2),
            new Product('Community management (April 2021)', 20.00, 1),
        ]);
    }

    public static function total(): float
    {
        return self::products()->sum(function (Product $product) {
            return $product->total();
        });
    }

    public static function qrCode()
    {
        $code = QrCode::format('png')->size(150)->generate('invoice-unique-code');

        return base64_encode($code);
    }

    public static function viewAttributes($inBackground = false)
    {
        return [
            'products' => self::products(),
            'total' => self::total(),
            'qrCode' => self::qrCode(),
            'inBackground' => $inBackground,
        ];
    }

    public static function generatePdf($inBackground = false)
    {
        return DomPDF::loadView('invoice', self::viewAttributes($inBackground));
    }

    public static function download()
    {
        $filename = self::filename();

        return self::generatePdf(true)->download($filename);
    }

    public static function outputAsBinary()
    {
        return self::generatePdf(true)->output();
    }

    public static function filename()
    {
        return 'invoice_' . now()->timestamp . '.pdf';
    }
}
