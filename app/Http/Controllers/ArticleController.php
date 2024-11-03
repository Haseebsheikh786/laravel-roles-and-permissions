<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
{
    return [
        new Middleware('permission:view articles', only: ['index']),
        new Middleware('permission:edit articles', only: ['edit']),
        new Middleware('permission:create articles', only: ['create']),
        new Middleware('permission:delete articles', only: ['destory']),
    ];
}
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));

    }

    public function create()
    {
        return view("articles.create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        Article::create($request->all());

        return redirect()->route('articles.index')->with('success', 'Article created successfully.');
    }


    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(Request $request, Article $article)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'author' => 'required|string|max:255',
        ]);

        $article->update($request->all());

        return redirect()->route('articles.index')->with('success', 'Article updated successfully.');
    }

    public function destroy(Article $article)
    {
        $article->delete();
        return redirect()->route('articles.index')->with('success', 'article deleted successfully.');
    }
}
