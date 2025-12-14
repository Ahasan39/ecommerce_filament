<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function show(Order $order)
    {
        return view('invoices.order-invoice', compact('order'));
    }

    public function download(Order $order)
    {
        $pdf = Pdf::loadView('invoices.order-invoice', compact('order'));
        return $pdf->download("invoice-{$order->id}.pdf");
    }
}

