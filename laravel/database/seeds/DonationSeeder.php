<?php

use App\Donation;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DonationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            'EUR',
            'CAD',
            'AUD',
            'JPY',
            'GBP',
            'USD',
        ];

        $names = [
            'Jack Jackson',
            'John Johnsson',
            'Thom Thomsson',
            'Ben Benson',
        ];

        $emails = [
            'banana@mail.com',
            'apple@mail.com',
            'berry@mail.com',
            'pineapple@mail.com',
        ];

        $messages = [
            'Great app!',
            'I will download this app right now!',
            'Keep up the great work!',
            'Amazing!',
        ];

        for ($i=0; $i < 6; $i++) { 
            $donation = new Donation();
            $donation->email = $emails[array_rand($emails)];
            $donation->name =  $names[array_rand($names)];
            $donation->amount = rand(50, 99999)/100;
            $donation->currency = $currencies[array_rand($currencies)];
            $donation->message =  $messages[array_rand($messages)];
            $donation->show = 1;
            $donation->save();
        }
    }
}
