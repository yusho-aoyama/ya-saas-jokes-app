<?php

namespace App\Http\Controllers;

use App\Models\Joke;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class JokeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jokes = Joke::paginate();

        return view('jokes.index')
            ->with('jokes', $jokes);
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
    public function store(StorejokeRequest $request)
    {
        //
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

        return to_route('jokes.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Joke $joke)
    {
        //
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
