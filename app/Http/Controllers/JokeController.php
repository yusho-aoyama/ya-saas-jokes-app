<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
// Adding Gates
use Illuminate\Support\Facades\Gate;
use Illuminate\Database\Eloquent\Builder;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $validated = $request->validate([
            'search' => [
                'nullable',
                'max:64',
                'string'
            ],
        ]);

        $search = $validated['search'] ?? '';

        $jokes = Joke::with('userVotes')
            ->withCount([
                'votes as likesCount'
                => fn (Builder $query)
                => $query->where('vote', '>', 0)], 'vote')
            ->withCount([
                'votes as dislikesCount'
                => fn (Builder $query)
                => $query->where('vote', '<', 0)], 'vote')
            ->latest();

        // Comment out if the search function is required
//        if ($search) {
//            $jokes->where('title', 'like', "%{$search}%");
//        }

        $jokes = $jokes->paginate();


        return view('jokes.index')
            ->with('jokes', $jokes)
            ->with('search', $search);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jokes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'title'=>[
                    'required',
                    'min:5',
                    'max:128',
                    Rule::unique('jokes', 'title')
                ],
                'content'=>[
                    'nullable',
                    'max:255',
                ]
            ]);

            // Create a new category
            $joke = Joke::create($validated);

            flash()->success("Joke '{$joke->title}' created successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Joke Added");

            return to_route('jokes.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Joke Creation Failed'
            );

            // return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Joke $joke
     * @return View
     */
    public function show(Joke $joke):View
    {
        return view('jokes.show')
            ->with('joke', $joke);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Joke $joke
     * @return View
     */
    public function edit(Joke $joke)
    {
        return view('jokes.edit')
            ->with('joke', $joke);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Joke $joke)
    {
        try {
            $oldJoke = $joke;

            $validated = $request->validate([
                'title'=>[
                    'required',
                    'min:5',
                    'max:128',
                    Rule::unique('jokes', 'title')->ignore($joke)
                ],
                'content'=>[
                    'nullable',
                    'max:255',
                ]
            ]);

            $joke->update($validated);

            flash()->success("Joke '{$joke->title}' updated successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Joke Updated");

            return to_route('jokes.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Joke Update Failed'
            );

            // Return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joke $joke)
    {
        try {
            // Save the current joke
            $oldJoke = $joke;

            // Delete
            $joke->delete();

            flash()->success("Joke '{$joke->title}' deleted successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Joke Deleted");

            return to_route('jokes.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Failed to delete joke.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Joke Deletion Failed'
            );

            // Return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Confirm the deletion of a joke resource from storage.
     *
     * @param Joke $joke
     * @return View
     */
    public function delete(Joke $joke):View
    {
        return view('jokes.delete')
            ->with('joke', $joke);
    }

}
