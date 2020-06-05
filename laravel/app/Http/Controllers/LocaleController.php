<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function set(Request $request)
    {
        $locale = $request->locale;
        if (! in_array($locale, ['en', 'nl'])) {
            abort(400);
        }
    
        session(['lang' => $locale]);

        return redirect()->back();
    }
}
