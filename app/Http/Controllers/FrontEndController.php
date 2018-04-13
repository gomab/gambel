<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Setting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index(){

        Carbon::setLocale('fr');
        setlocale(LC_TIME, 'fr');
        return view('index')
                ->with('title', Setting::first()->site_name)
                ->with('categories', Category::take(5)->get())
                ->with('first_post', Post::orderBy('created_at', 'desc')->first())
                ->with('second_post', Post::orderBy('created_at', 'desc')->skip(1)->take(1)->get()->first())
                ->with('third_post', Post::orderBy('created_at', 'desc')->skip(2)->take(1)->get()->first())
                ->with('culture', Category::find(7))
                ->with('science', Category::find(8))
                ->with('technology', Category::find(9))
                ->with('settings', Setting::first());

    }
}
