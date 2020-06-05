<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Mollie\Laravel\Facades\Mollie;

class MollieWebhookController extends Controller
{
    public function handle(Request $r) {
        if (! $r->has('id')) {
            return;
        }

        $payment = Mollie::api()->payments()->get($r->id);

        Log::info('Payment status. ' . json_encode($payment->status));
        if ($payment->isPaid()) {
            try {
                $donation = new Donation();
                $donation->email = $payment->metadata->email;
                $donation->name = $payment->metadata->name;
                $donation->amount = $payment->metadata->amount;
                $donation->currency = $payment->metadata->currency;
                $donation->message = $payment->metadata->message;
                $show = $payment->metadata->show == null ? 0 : 1;
                $donation->show = $show;
                $donation->save();
            } catch (\Throwable $th) {
                Log::warning('error. ' . json_encode($th));
            }
        } else {
            Log::warning('Payment Fail. ' . json_encode($payment->metadata));
        }
    }
}
