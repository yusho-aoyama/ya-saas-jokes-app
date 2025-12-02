<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Add use lines
use App\Models\User;
use Illuminate\Support\Collection;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
// https://laravel.com/docs/12.x/authorization#authorizing-or-throwing-exceptions

class UserManagementController extends Controller
{
    // to enable to use authorize()
    // https://laravel.com/docs/12.x/authorization#authorizing-or-throwing-exceptions
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // To retrieve 10 users and display them on the page
        $users = User::paginate(10);

        return view('admin.users.index')
                ->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Get All roles from database
        //  $roles = Role::all();

        // https://www.fundaofwebit.com/post/laravel-policy-using-spatie-roles-and-permission-tutorial-step-by-step
        // Identify which role the logged-in user has
        $loggedInUser = auth()->user();

        if ($loggedInUser->hasRole('super-user'))
        {
            // The super-admin can create all role's account
            $roles = Role::all();
        }
        elseif ($loggedInUser->hasRole('admin'))
        {
            // Except for super-admin (https://laravel.com/docs/12.x/queries#where-not-clauses)
            $roles = Role::whereNotIn('name', ['super-user'])->get();
        }
        elseif ($loggedInUser->hasRole('staff'))
        {
            // Except for super-admin and admin
            $roles = Role::whereNotIn('name', ['super-user', 'admin'])->get();
        }
        else {
            $roles = collect();
        }

        return view('admin.users.create')
            ->with('roles', $roles);
    }

    /**
     * Store a newly created resource in storage.
     *
     * The store method will
     * - validate the data
     * - create a new user
     * - return to the users index page
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                // Update validation
                'given_name' => ['nullable', 'string', 'max:255'],
                'family_name' => ['required', 'string', 'min:1', 'max:255'],
                'name' => ['nullable', 'string', 'min:1', 'max:64'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Password::defaults()],
                'role'=>['nullable',],
            ]);

            if (empty($validated['name'])) {
                $validated['name'] = $validated['family_name'];
            }

            $user = User::create([
                'given_name' => $validated['given_name'] ?? null,
                'family_name' => $validated['family_name'],
                'name' => $validated['name'],
                'email' => mb_strtolower($request->email),
                'password' => Hash::make($request->password),
            ]);

            // Asiign role if it was selected
            if (!empty($validated['role'])) {
                $user->assignRole($validated['role']);
            }

            // Send a email when registered
            // Commentout -> because event will happen in the Models
            //   $user->sendEmailVerificationNotification();

            flash()->success("User '{$user->name}' created successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "User Added");
            return redirect(route('admin.users.index'));
        } catch (\Illuminate\Validation\ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                ['position' => 'top-center', 'timeout' => 5000],
                'User Creation Failed'
            );

            return back()->withErrors($e->validator)->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Get roles data
        // getRoleNames() returns a Collection of role names that the user has
        // ['super-user', 'admin', 'staff', 'client']
        $roles = $user->getRoleNames();

        return view('admin.users.show')
            ->with('user', $user)
            -> with('roles', $roles);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // The difference from the add
        // - The method expects the user details to be given to it... the user that will be edited: (User $user)\
        // - The view call puts the roles and the user data into the packet that is sent to the view.
        // TODO: Update when we add Roles & Permissions
        // $roles = Collection::empty();

        // Call the policy
        $this->authorize('update', $user);

        $loggedInUser = auth()->user();

        if ($loggedInUser->hasRole('super-user')) {
            $roles = Role::all();
        } elseif ($loggedInUser->hasRole('admin')) {
            $roles = Role::whereNotIn('name', ['super-user'])->get();
        } elseif ($loggedInUser->hasRole('staff')) {
            $roles = Role::whereIn('name', ['staff', 'client'])->get();
        } else {
            $roles = collect();
        }

        return view('admin.users.edit')
            ->with('roles', $roles)
            ->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        try {
            // the method should not change from the default that was created by the artisan command.
            $validated = $request->validate([
                // Update the validation
                'given_name' => ['nullable', 'string', 'max:255'],
                'family_name' => ['required', 'string', 'min:1', 'max:255'],
                'name' => ['nullable', 'string', 'min:1', 'max:64'],
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:255',
                    Rule::unique(User::class)->ignore($user),
                ],
                'password' => [
                    'sometimes',
                    'nullable',
                    'confirmed',
                    // Rules\Password::defaults()
                    Password::defaults()
                ],
                'role' => ['nullable',],
            ]);

            if (empty($validated['name'])) {
                $validated['name'] = $validated['family_name'];
            }

            if (!empty($validated['role'])) {
                $user->syncRoles([$validated['role']]); // Update to the selected role
            } else {
                $user->syncRoles([]); // Reset if no role is selected
            }

            // Remove password if null
            // check to see if the validated password is null, and if so remove the array key so it does not violate the "required" and "not null" data requirements in the model.
            if (is_null($validated['password'])) {
                unset($validated['password']);
            }

            // To tell Laravel to fill the changed fields with the validated data
            $user->fill($validated);

            // Checks to see if the email has changed...
            // "is the data dirty": If it is then we force the user to verify the new email address...
            if ($user->isDirty('email')) {
                $user->email_verified_at = null;
            }

            // To set we save the updated user data
            $user->save();

            $userName = $user->name;

            flash()->success("User '{$user->name}' edited successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "User Updated");

            // Redirect back to the user index view
            return redirect(route('admin.users.index'));

        } catch (\Illuminate\Validation\ValidationException $e) {

            flash()->error(
                'Please fix the errors in the form.',
                ['position' => 'top-center', 'timeout' => 5000],
                'User Update Failed'
            );

            return back()->withErrors($e->validator)->withInput();
        }
    }

    /**
     * Confirm removal of the User resource from storage.  */
    public function delete(User $user)
    {
        $roles = $user->getRoleNames();
        return view('admin.users.delete')
            ->with('roles', $roles)
            ->with('user', $user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // call the policy
        $this->authorize('delete', $user);


        try {
            $removed_user = $user;
            $user->delete();

            flash()->success("User '{$user->name}' deleted successfully!",
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                "User Deleted");
            return redirect(route('admin.users.index'));
        } catch (ValidationException $e) {

            flash()->error(
                'Failed to delete user.',
                [
                    'position' => 'top-center',
                    'timeout' => 5000,
                ],
                'User Deletion Failed'
            );

            // Return the validation error to the form
            return back()->withErrors($e->validator)->withInput();
        }

    }
}
