<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Number;
use Illuminate\View\View;
// add use lines
use App\Models\Category;
use App\Models\Joke;
use Spatie\Permission\Models\Role;

class AdminController extends Controller
{
    //
    public function index(): View
    {
        $userCount = User::count();
        $userSuspendedCount = User::where('suspended', 1)->count();

        // Count category/ joke/ role numbers
        $categoryCount = Category::count();
        $jokeCount = Joke::count();
        $roleCount = Role::count();

        return view('admin.index')
            ->with('userCount', Number::format($userCount))
            ->with('userSuspendedCount', Number::format($userSuspendedCount))
            ->with('jokeCount', $jokeCount)
            ->with('categoryCount', $categoryCount)
            ->with('roleCount', $roleCount);
    }

    //
    public function users(): View
    {
        $users = User::paginate(10);

        return view('admin.users.index')
            ->with('users', $users);
    }
}
