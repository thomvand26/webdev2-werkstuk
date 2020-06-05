<?php

namespace App\Http\Controllers;

use App\APIKey;
use App\Article;
use App\Donation;
use App\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndexPage() {
        $pages = Page::all();
        return view('dashboard.pages.index', [
            'pages' => $pages,
        ]);
    }
    
    public function getCreatePage() {
        return view('dashboard.pages.create', []);
    }
    
    public function postCreatePage(Request $r) {
        $page = new Page();
        $page->title = $r->title;
        $page->slug = Str::slug($r->title);
        $page->active = $r->active;
        $page->template = $r->template;
        $page->intro = $r->intro;
        $page->content = $r->content;
        $page->save();

        return redirect()->route('dashboard.pages.index');
    }

    public function getEditPage(Page $page) {
        return view('dashboard.pages.edit', [
            'page' => $page,
        ]);
    }

    public function postEditPage(Page $page, Request $r) {
        if ($r->id != $page->id) abort('403', 'Page ids not matching.');

        $page->title = $r->title;
        $page->slug = Str::slug($r->title);
        $page->active = $r->active;
        $page->template = $r->template;
        $page->intro = $r->intro;
        $page->content = $r->content;
        $page->save();

        return redirect()->route('dashboard.pages.index');
    }

    public function postDeletePage(Page $page, Request $r) {
        if ($r->id != $page->id) abort('403', 'Page ids not matching.');

        $page->delete();
        return redirect()->route('dashboard.pages.index');
    }



    public function getIndexArticle() {
        $articles = Article::all();
        return view('dashboard.articles.index', [
            'articles' => $articles,
        ]);
    }
    
    public function getCreateArticle() {
        return view('dashboard.articles.create', []);
    }
    
    public function postCreateArticle(Request $r) {
        $article = new Article();
        $article->title = $r->title;
        $article->slug = Str::slug($r->title);
        $article->intro = $r->intro;
        $article->content = $r->content;
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $originalFileName = $file->getClientOriginalName();
            $uniqueFileName = time() . '-' . $originalFileName;
            Storage::disk('local')->put('public/uploads/' . $uniqueFileName, file_get_contents($file));
            $article->image = $uniqueFileName;
        } else {
            $article->image = '';
        }
        $article->save();

        return redirect()->route('dashboard.articles.index');
    }

    public function getEditArticle(Article $article) {
        return view('dashboard.articles.edit', [
            'article' => $article,
        ]);
    }

    public function postEditArticle(Article $article, Request $r) {
        if ($r->id != $article->id) abort('403', 'Article ids not matching.');

        Storage::disk('local')->delete('public/uploads/' . $article->image);

        $article->title = $r->title;
        $article->slug = Str::slug($r->title);
        $article->intro = $r->intro;
        $article->content = $r->content;
        if ($r->hasFile('image')) {
            $file = $r->file('image');
            $extension = $file->getClientOriginalExtension();
            $originalFileName = $file->getClientOriginalName();
            $uniqueFileName = time() . '-' . $originalFileName;
            Storage::disk('local')->put('public/uploads/' . $uniqueFileName, file_get_contents($file));
            $article->image = $uniqueFileName;
        } else {
            $article->image = '';
        }
        $article->save();

        return redirect()->route('dashboard.articles.index');
    }

    public function postDeleteArticle(Article $article, Request $r) {
        if ($r->id != $article->id) abort('403', 'Article ids not matching.');

        Storage::delete('public/uploads/' . $article->image);

        $article->delete();
        return redirect()->route('dashboard.articles.index');
    }


    
    public function getIndexDonation() {
        $donations = Donation::all();
        return view('dashboard.donations.index', [
            'donations' => $donations,
        ]);
    }


    
    public function getIndexAPIKey() {
        $apikeys = ApiKey::all();
        return view('dashboard.apikeys.index', [
            'apikeys' => $apikeys,
        ]);
    }
    
    public function getCreateAPIKey() {
        return view('dashboard.apikeys.create', []);
    }
    
    public function postCreateAPIKey(Request $r) {
        $apikey = new ApiKey();
        $apikey->key = $r->key;
        $apikey->value = $r->value;
        $apikey->save();

        return redirect()->route('dashboard.apikeys.index');
    }

    public function getEditApiKey(ApiKey $apikey) {
        return view('dashboard.apikeys.edit', [
            'apikey' => $apikey,
        ]);
    }

    public function postEditApiKey(ApiKey $apikey, Request $r) {
        if ($r->id != $apikey->id) abort('403', 'ApiKey ids not matching.');

        $apikey->key = $r->key;
        $apikey->value = $r->value;
        $apikey->save();

        return redirect()->route('dashboard.apikeys.index');
    }

    public function postDeleteApiKey(ApiKey $apikey, Request $r) {
        if ($r->id != $apikey->id) abort('403', 'ApiKey ids not matching.');

        $apikey->delete();
        return redirect()->route('dashboard.apikeys.index');
    }
}
