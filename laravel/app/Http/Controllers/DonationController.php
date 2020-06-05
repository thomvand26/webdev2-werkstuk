<?php

namespace App\Http\Controllers;

use App\Donation;
use Illuminate\Http\Request;
use Mollie\Laravel\Facades\Mollie;


class DonationController extends Controller
{
    public function index()
    {
        $currencies = [
            'EUR',
            'AUD',
            'CAD',
            'GBP',
            'JPY',
            'USD',
        ];

        $donations = Donation::where('show', 1)->orderBy('created_at', 'desc')->get();

        return view('donations.index', [
            'currencies' => $currencies,
            'donations' => $donations,
        ]);
    }

    public function create(Request $r)
    {
        if (!$r->amount) dd('no amount');
        if (!$r->currency) dd('no currency');
        $amount = strval(number_format($r->amount, 2, '.', ''));

        // Mollie
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => $r->currency,
                "value" => $amount
            ],
            "description" => "Order #12345",
            "webhookUrl" => 'https://342bfa28b7d4.ngrok.io/webhooks/mollie',
            "redirectUrl" => route('donations.success'),
            "metadata" => [
                "email" => $r->email,
                "name" => $r->name,
                "amount" => $r->amount,
                "currency" => $r->currency,
                "message" => $r->message,
                "show" => $r->show,
            ],
        ]);

        $payment = Mollie::api()->payments->get($payment->id);
        
        // Redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success ()
    {
        // Redirect
        return redirect()->route('donations.index');
    }
}
