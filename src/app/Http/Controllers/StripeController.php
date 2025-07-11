<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Reservation;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use App\Models\Payment;

class StripeController extends Controller
{
    public function payment($id)
    {
        $reservation = Reservation::find($id);
        $amount = $reservation->number * 5000;
        $currency = 'jpy';

        Stripe::setApiKey(env('STRIPE_SECRET'));

        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => $currency,
                    'product_data' => [
                        'name' => $reservation->shop->name,
                    ],
                    'unit_amount' => $amount,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('stripe.success', compact('id')) . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('stripe.cancel', compact('id')),
        ]);

        return redirect()->away($session->url);
    }

    public function success($id)
    {
        $reservation = Reservation::find($id);

        Payment::create([
            'reservation_id' => $id,
            'user_id' => Auth::user()->id,
            'shop_id' => $reservation->shop_id,
            'amount' => $reservation->number * 5000,
            'currency' => 'jpy',
            'status' => 'succeeded',
        ]);

        $message = '予約の支払いが正常に完了しました';

        return redirect()->route('done', compact('message'));
    }

    public function cancel()
    {
        $message = '予約の支払いがキャンセルされました';

        return redirect()->route('done', compact('message'));
    }
}
