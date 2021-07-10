<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Lato', sans-serif;
        }
    </style>
    @if($inBackground)
        <link rel="stylesheet" href="{{ public_path('css/invoice.css') }}">
    @else
        <link rel="stylesheet" href="{{ asset('css/invoice.css') }}">
    @endif
    <title>Invoice</title>
</head>
<body>
    @unless($inBackground)
        <div class="options">
            <button class="button" onclick="window.print()">Imprimir</button>
            <a class="button" href="{{ route('invoice.download') }}">Descargar PDF</a>
            <a class="button" href="{{ route('invoice.send') }}">Enviar a customer@example.test</a>
        </div>
    @endunless

    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr>
                <td class="w-50">
                    {{-- Using a URL from another domain may not shown the image correctly --}}
                    {{-- <img src="https://via.placeholder.com/400x100?text=Your%20Company%20Logo" style="width: 100%; max-width: 300px"> --}}
                    @if($inBackground)
                        <img src="{{ public_path('img/invoice-logo.png') }}" style="width: 100%; max-width: 300px">
                    @else
                        <img src="{{ asset('img/invoice-logo.png') }}" style="width: 100%; max-width: 300px">
                    @endif
                </td>

                <td class="text-center">
                    <div><span class="bold">NIT</span>: 1000000</div>
                    <div><span class="bold">INVOICE</span> #50</div>
                    <div><span class="bold">AUTHORIZATION</span>: 123456789</div>
                </td>
            </tr>
        </table>

        {{-- company information --}}
        <table class="mt" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <div>The Best Company</div>
                    <div>Main Avenue #50</div>
                    <div>Phone: 1900-0000</div>
                    <div>Santa Cruz - Bolivia</div>
                </td>

                <td class="text-center">
                    <div class="bold">INVOICE</div>
                    <div>Business Sector</div>
                </td>
            </tr>
        </table>

        {{-- customer information --}}
        <div class="mt">
            <div><span class="bold">Place and date:</span> Santa Cruz, 27/03/2021</div>
            <div><span class="bold">To:</span> John Doe</div>
            <div><span class="bold">NIT:</span> 0</div>
        </div>

        {{-- invoice items --}}
        <table class="items-table mt" cellpadding="0" cellspacing="0">
            <thead>
                <tr class="heading">
                    <th>Item</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Price</th>
                </tr>
            </thead>

            @foreach($products as $product)
                <tr class="item">
                    <td>{{ $product->name }}</td>
                    <td class="text-right">{{ $product->quantity }}</td>
                    <td class="text-right">${{ $product->price }}</td>
                </tr>
            @endforeach

            <tr class="total">
                <td colspan="3">Total: ${{ $total }}</td>
            </tr>
        </table>

        <table class="mt">
            <tr>
                <td class="w-50">
                    <img src="data:image/png;base64, {{ $qrCode }}" style="width: 3.5cm;">
                </td>

                <td class="w-50 text-center">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                    Nulla assumenda minus eligendi saepe quae omnis
                    itaque doloremque doloribus esse at sit
                    aliquid quaerat.
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
