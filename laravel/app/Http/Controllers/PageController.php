<?php

namespace App\Http\Controllers;

use App\Page;

class PageController extends Controller
{
    public function getPage($slug) {
        $page = Page::where('slug', $slug)->first();
        if (!$page) abort('404');
        
        return view('pages.' . $page->template, [
            'page' => $page,
        ]);
    }
}
