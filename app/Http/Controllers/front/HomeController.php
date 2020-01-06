<?php

namespace App\Http\Controllers\front;

use App\frontmodels\Portfolio;
use App\frontmodels\Article;
use App\frontmodels\Category;
use App\frontmodels\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $portfolios = Portfolio::orderBy('id', 'DESC')->get();
        $tags = $portfolios->unique('tag');

        return view('front.main', compact('portfolios', 'tags'));
    }


    public function show()
    {
        // $article->increment('hit');
        // $comments = $article->comments()->where('status', 1)->get();
        // return view('front.article', compact('article', 'comments'));
    }
}
