<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;
use App\Models\Article;
use App\Providers\ArticleUpdated;
use Dotenv\Loader\Loader;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Gate as FacadesGate;
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
        // dd($articles);
        // $timecreated = Carbon::createFromTimeString($articles)->format('Y/m/d H:i'); // ? 12/4
        return view('articles.homepage', compact('articles'));
    }

    public function create()
    {
        if (Gate::denies('create', Article::class)) {
            return redirect()->route('showHomePage');
        }
        return view('articles.create');
    }

    public function store(UpdateArticleRequest $request): RedirectResponse
    {

        if (Gate::denies('create', Article::class)) {
            return redirect()->route('showHomePage');
        }

        $validated = $request->validate([
            'title' => ['required', 'string'],
            'content' => ['required', 'string'],
            /**'image' => ['image'],*/
        ]);

        Article::create($validated);
        return redirect()->route('showHomePage');
    }

    // public function store(StoreArticleRequest $request) //驗證資料格式
    // {

    //     auth()->user()->article()->create($request->validated());
    //     /**跳錯誤正常，不用理他 */

    //     return redirect()->route('showHomePage');
    // }

    public function show(Article $article)
    {
        // dd($article);
        // $article = Article::get();
        /*$article = load('title');*/
        /*卡在request*/
        return view('articles.show_article', compact('article'));
    }

    public function readmore(Article $article)
    {
        return view('articles.readmore', compact('article'));
    }


    public function indexWithDestroyed()
    {
        if (Gate::denies('viewAnyWithDestroyed', Article::class)) {
            return redirect()->route('showHomePage');
        }

        $articles = Article::withTrashed()
            ->get();

        // dd($articles);
        return view('articles.homepage', compact('articles'));
    }



    public function edit(Article $article)
    {
        // dd($article);
        return view('articles.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, Article $article)
    {

        //compact('article'); //?
        $article->fill($request->validated());
        if ($article->isDirty()) {
            $article->save();
            event(new ArticleUpdated($article)); //傳的參數是被update的course
        }

        return redirect()->route('showHomePage', ['article' => $article]); //['article' => $article]
    }


    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('showHomePage');
    }


    public function restore(Article $article)
    {
        $article->restore();
        return back();
    }
}
