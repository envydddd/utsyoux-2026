<?php

namespace App\Http\Controllers;

use App\Models\TopUpPayment;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class TopUpPaymentController extends Controller
{
    /**
     * Accept webhook or direct POST from payment gateway / frontend
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'nullable|numeric',
            'player_id' => 'nullable|string|max:255',
            'order_id' => 'nullable|string|max:255',
            'amount' => 'required|numeric',
            'currency' => 'nullable|string|max:10',
            'status' => 'required|string|max:50',
            'payment_method' => 'nullable|string|max:100',
            'transaction_id' => 'nullable|string|max:255',
            'metadata' => 'nullable',
        ]);

        $payment = TopUpPayment::create([
            'user_id' => $data['user_id'] ?? null,
            'player_id' => $data['player_id'] ?? null,
            'order_id' => $data['order_id'] ?? null,
            'amount' => $data['amount'],
            'currency' => $data['currency'] ?? 'IDR',
            'status' => $data['status'],
            'payment_method' => $data['payment_method'] ?? null,
            'transaction_id' => $data['transaction_id'] ?? null,
            'metadata' => is_array($data['metadata'] ?? null) ? $data['metadata'] : null,
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        return response()->json(['ok' => true, 'id' => $payment->id], 201);
    }
}
