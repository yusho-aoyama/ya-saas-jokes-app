<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Joke;

class StaticPageController extends Controller
{
    /**
     * Display the Site Welcome / Index page
     */
    public function home(): View
    {
//        $jokes = Joke::paginate();
//
//        return view('static.welcome')
//            ->with('jokes', $jokes);

        // Get a random joke
        $joke = Joke::inRandomOrder()->first();

        return view('static.welcome')
            ->with('joke', $joke);
    }

    public function about(): View
    {
        //        return view('static.about');
    }

    public function contact(): View
    {
        //        return view('static.contact');
    }

    public function privacy(): View
    {
        //        return view('static.privacy');
    }

    public function terms(): View
    {
        //        return view('static.terms');
    }
}
