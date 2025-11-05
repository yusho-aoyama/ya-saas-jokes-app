<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CategoryManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::paginate();

        return view('admin.categories.index')
            ->with('categories', $categories);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
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
                    'min:3',
                    'max:64',
                    Rule::unique('categories', 'title')
                ],
                'description' => [
                    'nullable',
                    'max:255',
                ]
            ]);

            // Create a new category
            $category = Category::create($validated);

            flash()->success("Category '{$category->title}' created successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Category Added");

            return to_route('admin.categories.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Category Creation Failed'
            );

            // return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Category $category
     * @return View
     */
    public function show(Category $category): View
    {
        return view('admin.categories.show')
            ->with('category', $category);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Category $category
     * @return View
     */
    public function edit(Category $category): View
    {
        return view('admin.categories.edit')
            ->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        try {
            $oldCategory = $category;

            $validated = $request->validate([
                'title'=>[
                    'required',
                    'min:3',
                    'max:64',
                    Rule::unique('categories', 'title')->ignore($category)
                ],
                'description' => [
                    'nullable',
                    'max:255',
                ]
            ]);

            $category->update($validated);

            flash()->success("Category '{$category->title}' updated successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Category Updated");

            return to_route('admin.categories.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Category Update Failed'
            );

            // Return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }

    }

    /**
     * Confirm the deletion of a category resource from storage.
     * @param Category $category
     * @return View
     */
    public function delete(Category $category): View
    {
        return view('admin.categories.delete')
            ->with('category', $category);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        try {
            // Save the current category
            $oldCategory = $category;

            // Delete
            $category->delete();

            flash()->success("Category '{$category->title}' deleted successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "Category Deleted");

            return to_route('admin.categories.index');
        } catch (ValidationException $e) {

            flash()->error(
                'Failed to delete category.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'Category Deletion Failed'
            );

            // Return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }

    }
}
