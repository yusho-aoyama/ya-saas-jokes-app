<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Joke;
// Adding Gates
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;


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

        // Get a random joke with like/dislike ( only if user is logged in)
        $joke = Joke::with('userVotes')
            ->withCount([
                'votes as likesCount' => fn (Builder $query) => $query->where('vote', '>', 0)
            ])
            ->withCount([
                'votes as dislikesCount' => fn (Builder $query) => $query->where('vote', '<', 0)
            ])
            ->inRandomOrder()
            ->first();

        return view('static.welcome')
            ->with('joke', $joke);

//        $joke = Joke::inRandomOrder()->first();
//
//        return view('static.welcome')
//            ->with('joke', $joke);
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
