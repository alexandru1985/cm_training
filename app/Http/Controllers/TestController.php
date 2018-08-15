<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Article;
use App\User;

class TestController extends Controller {

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function one_to_many_belongs() {
        $articles = Article::where('id', '>',1)
                ->orderBy('title', 'desc')
                ->take(10)
                ->get();
        return view('one_to_many_belongs', compact('articles'));
    }

    public function one_to_many_has_many($username) {
        $user = User :: where('name', $username)->first();
        return view('one_to_many_has_many', compact('user'));
    }

}
