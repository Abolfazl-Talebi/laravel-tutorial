<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Article;
use App\frontmodels\Category;
use App\frontmodels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $articles = Article::orderBy('id', 'DESC')->where('status', 1)->paginate(20);
        return view('front.articles', compact('articles'));
    }


    public function show(Article $article)
    {
        $article->increment('hit');
        $comments = $article->comments()->where('status', 1)->get();
        return view('front.article', compact('article', 'comments'));
    }
}
