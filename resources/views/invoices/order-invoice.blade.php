<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $order->id }}</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 20px;
        }

        .invoice-box {
            background: #fff;
            padding: 40px;
            max-width: 800px;
            margin: auto;
            border-radius: 8px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 20px;
        }

        .company-info, .invoice-info {
            font-size: 14px;
            line-height: 1.6;
        }

        .logo {
            max-height: 60px;
            margin-bottom: 10px;
        }

        h2 {
            margin: 0;
            color: #333;
        }

        h4 {
            margin-bottom: 8px;
            color: #444;
        }

        .section {
            margin-top: 25px;
        }

        .section p {
            margin: 3px 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 25px;
        }

        thead {
            background-color: #007bff;
            color: #fff;
        }

        th, td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .text-right {
            text-align: right;
        }

        .summary-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .summary-table td {
            padding: 10px;
            font-size: 15px;
        }

        .summary-table tr td:first-child {
            text-align: right;
            font-weight: bold;
        }

        .summary-table tr td:last-child {
            text-align: right;
        }

        .print-button {
            margin-top: 30px;
            text-align: center;
        }

        .print-button button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 25px;
            font-size: 16px;
            border-radius: 6px;
            cursor: pointer;
        }

        .print-button button:hover {
            background-color: #0056b3;
        }

        @media print {
            .print-button {
                display: none;
            }

            body {
                background: #fff;
                margin: 0;
            }

            .invoice-box {
                box-shadow: none;
                padding: 0;
            }
        }
    </style>
</head>
<body>
    <div class="invoice-box">
        <!-- Header -->
        <div class="header">
            <div class="company-info">
                <img src="{{ asset('front-assets/images/logo.jpeg') }}" alt="Company Logo" class="logo"><br>
                <strong>Khadyobitan</strong><br>
                Chattogram, Bangladesh<br>
                Phone: 01820551127<br>
                Email: info@khadyobitan.com
            </div>
            <div class="invoice-info">
                <h2>Invoice</h2>
                <p><strong>Invoice Number:</strong> #{{ $order->id }}</p>
                <p><strong>Date:</strong> {{ $order->created_at->format('d M Y') }}</p>
                <p><strong>Status:</strong> {{ ucfirst($order->status) }}</p>
            </div>
        </div>

        <!-- Customer Info -->
        <div class="section">
            <h4>Customer Information</h4>
            {{-- Name --}}
            <p><strong>Name:</strong>
                {{ $order->user?->name ?? $order->address?->full_name ?? 'Guest User' }}
            </p>

            {{-- Email --}}
            <p><strong>Email:</strong>
                {{ $order->user?->email ?? 'N/A' }}
            </p>

            {{-- Address --}}
            @if($order->address)
                <p><strong>Phone:</strong> {{ $order->address->phone }}</p>
                <p><strong>Address:</strong>
                    {{ $order->address->street_address }},
                    {{ $order->address->city }}
                </p>
            @else
                <p><strong>Address:</strong> Not available</p>
            @endif


        <!-- Payment Info -->
        <div class="section">
            <h4>Payment Method</h4>
            <p>{{ ucfirst($order->payment_method ?? 'Not Specified') }}</p>
        </div>

       <!-- Products -->
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th class="text-right">Quantity</th>
                    <th class="text-right">Unit Price</th>
                    <th class="text-right">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->items as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td class="text-right">{{ $item->quantity }}</td>
                        <td class="text-right">{{ number_format($item->unit_amount, 2) }}</td>
                        <td class="text-right">{{ number_format($item->total_amount, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Totals -->
        <table class="summary-table">
            <tr>
                <td>Subtotal</td>
                <td>{{ number_format($order->items->sum('total_amount'), 2) }} {{ strtoupper($order->currency) }}</td>
            </tr>
            <tr>
                <td>Delivery Charge</td>
                <td>{{ number_format($order->delivery_charge ?? 0, 2) }} {{ strtoupper($order->currency) }}</td>
            </tr>
            @if($order->discount)
            <tr>
                <td>Discount</td>
                <td>-{{ number_format($order->discount, 2) }} {{ strtoupper($order->currency) }}</td>
            </tr>
            @endif
            <tr>
                <td>Grand Total</td>
                <td><strong>{{ number_format($order->calculated_grand_total, 2) }} {{ strtoupper($order->currency) }}</strong></td>
            </tr>
        </table>

        <!-- Print Button -->
        <div class="print-button">
            <button onclick="window.print()">Print Invoice</button>
        </div>
    </div>
</body>
</html>
