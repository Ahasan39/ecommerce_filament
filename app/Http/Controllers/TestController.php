<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Support\Facades\Http;

class TestController extends Controller
{
    public function sendToCourier($orderId)
    {
        $order = Order::with('address')->findOrFail($orderId);

        $address = $order->address;

        $fullAddress = implode(', ', array_filter([
            $address->street_address ?? null,
            $address->city ?? null,
            $address->zip ?? null,
        ]));

        $data = [
            'order_id'         => $order->id,
            'customer_name'    => $address->first_name . ' ' . $address->last_name,
            'customer_phone'   => $address->phone ?? null,
            'delivery_address' => $fullAddress,
            'amount'           => $order->total_amount,
            'note'             => 'Order placed by ' . $address->first_name,
        ];

        $response = Http::withHeaders([
            'api-key'      => env('STEADFAST_API_KEY', 'test-api-key'),
            'secret-key'   => env('STEADFAST_SECRET_KEY', 'test-secret-key'),
            'authorization'=> 'Bearer ' . env('STEADFAST_BEARER_TOKEN', 'test-bearer-token'),
        ])->post('https://webhook.site/36ff001e-a0f4-439f-9083-74561d0c5d6a', $data);

        return response()->json([
            'message' => 'Order sent successfully!',
            'response_status' => $response->status(),
            'response_body' => $response->json(),
        ]);
    }
}
