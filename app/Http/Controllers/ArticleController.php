<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArticleRequest;
use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ArticleController extends Controller
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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function homepage()
    {
        $articles = Article::get();

        return view('articles.homepage', compact('articles'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            /**'image' => ['image'],*/
        ]);
        Article::create($validated);
        return redirect()->route('showHomePage');
    }

    public function show(Article $article)
    {
        $article = Article::get();
        return view('articles.show_article', compact('article'));
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('showHomePage');
    }
}
