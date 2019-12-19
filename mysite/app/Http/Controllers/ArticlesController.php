<?php

namespace App\Http\Controllers;

use App\Articles;
use Illuminate\Http\Request;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $articles = Articles::where('title', 'LIKE', '%' . request('search') . '%')->get();
            /* alt: pesquisa todos os campos
            $articles = $articles->filter(function ($value, $key) {
                return strpos($value, request('search'));
            });
            */
        } else {
            $articles = Articles::all();
        }
        return view('articles.index', ['articles' => $articles]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'min:3']
        ]);
        $article = Articles::create($validated);
        if (request('featured') == 'on') {
            $article->featured = 1;
            $article->save();
        }
        return redirect('/articles');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', compact('article'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $validated = request()->validate([
            'title' => ['required', 'min:3'],
            'content' => 'nullable'
        ]);

        $article->update($validated);

        return redirect('/articles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('/articles');
    }

    # TRAB
    public function sort($order)
    {
        if ($order) {
            $sorted = Articles::all()->sortByDesc('created_at');
        } else {
            $sorted = Articles::all()->sortBy('created_at');
        }
        return view('articles.index', ['articles' => $sorted]);
    }
    
    public function featured()
    {
        $featured = Articles::where('featured', 1)->get();
        #$featured = Article::all()->where('featured', 1); # alt
        return view('articles.featured', ['articles' => $featured]);
    }
}
