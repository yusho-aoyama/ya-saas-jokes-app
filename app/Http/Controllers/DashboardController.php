<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
// Add new use lines
use App\Models\Joke;

class DashboardController extends Controller
{
    public function dashboard(): View
    {
        $user = auth()->user();

        // Count the logged-in user's number of jokes
        $jokeCount = Joke::where('user_id', $user->id)->count();

        // Collect votes of jokes that the logged-in user created
        $votes = $user->jokes()
            ->with('votes')
            ->get()
            ->pluck('votes')  // Make all jokes collections
            ->flatten();

        $likes = $votes->where('vote', 1)->count();
        $dislikes = $votes->where('vote', -1)->count();

        return view('static.dashboard')
            ->with('user', $user)
            ->with('jokeCount', $jokeCount)
            ->with('likes', $likes)
            ->with('dislikes', $dislikes);
    }
}
