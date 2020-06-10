<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Spatie\Newsletter\NewsletterFacade as Newsletter;

class MailController extends Controller
{
    public function postContact(Request $r) {

        $data = [
            'name' => $r->name,
            'email' => $r->email,
            'subject' => $r->subject,
            'content' => $r->content,
        ];

        Mail::send('mails.contact', $data, function ($message) use($r) {
            $message->sender('thomas.vandevelde2@student.arteveldehs.be');
            $message->to('thomas.vandevelde2@student.arteveldehs.be', 'Yousician');
            $message->cc($r->email, $r->name);
            $message->subject($r->subject);
        });

        return redirect('contact');
    }

    public function subscribe(Request $r) {
        Newsletter::subscribeOrUpdate($r->email);

        return redirect()->back();
    }
}
