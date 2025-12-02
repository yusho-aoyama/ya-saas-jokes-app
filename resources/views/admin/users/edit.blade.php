<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{ __('Edit User Details') }}
            </h3>
        </header>
        {{-- show each new section as a separate block of code. --}}
        <article class="flex flex-col text-neutral-800 block border border-neutral-300 shadow-sm">
            <header class="bg-neutral-800 text-neutral-50 text-lg px-4 py-2">
                <h5>
                    {{ __('Edit User Details') }}
                </h5>
            </header>
            <section class="p-4">
                <form method="POST"
                      class="sm:gap-4 lg:gap-6 w-full"
                      action="{{ route('admin.users.update', $user) }}">

                    @csrf
                    {{-- The @method() is Laravel's way of "faking" the HTTP (Patch) Request Verb that most web servers do not 'comprehend' and pass onto the application server --}}
                    @method('PATCH')


                    <div class="w-full mt-4 sm:mt-0 flex flex-col space-y-2  text-neutral-700">
                        {{-- The Given Name Field --}}
                        <x-input-label for="given_name">
                            {{ __("Given Name") }}
                        </x-input-label>
                        <x-text-input
                            type="text"
                            id="given_name"
                            name="given_name"
                            class="block mt-1 w-full"
                            :value="old('given_name', $user->given_name)" />
                        <x-input-error
                            :messages="$errors->get('given_name')"
                            class="mt-2"/>

                        {{-- The Family Name Field --}}
                        <x-input-label for="family_name">
                            {{ __("Family Name") }}
                        </x-input-label>
                        <x-text-input
                            type="text"
                            id="family_name"
                            name="family_name"
                            class="block mt-1 w-full"
                            :value="old('family_name', $user->family_name)"
                            required />
                        <x-input-error
                            :messages="$errors->get('family_name')"
                            class="mt-2"/>

                        {{-- The Preferred Name Field --}}
                        <x-input-label for="name">
                            {{ __("Preferred Name") }}
                        </x-input-label>
                        <x-text-input
                            type="text"
                            id="name"
                            name="name"
                            class="block mt-1 w-full"
                            :value="old('name', $user->name)" />
                        <x-input-error
                            :messages="$errors->get('name')"
                            class="mt-2"/>

                        {{-- The Email Field --}}
                        <x-input-label for="Email">
                            {{__("Email")}}
                        </x-input-label>
                        <x-text-input
                            type="text"
                            id="Email"
                            class="block mt-1 w-full"
                            name="email"
                            :value="old('name')??$user->email"
                            required autofocus autocomplete="email"/>
                        <x-input-error
                            :messages="$errors->get('email')"
                            class="mt-2"/>

                        {{-- The Role Field --}}
                        <x-input-label for="Role">
                            {{__("Role")}}
                        </x-input-label>
                        <select id="Role"
                                name="role"
                                class="block mt-1 w-full px-2 py-1 border-gray-300
                                        focus:outline-indigo-500 focus:outline-2 focus:ring-2 focus:ring-indigo-500
                                        rounded-md shadow-sm"
                                type="text"
                                :value="old('role')"
                                required autofocus autocomplete="role">
                            <option value="">-- Select Role --</option>

                            @foreach ($roles as $role)
                                <option value="{{ $role->name }}"
                                    {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                                    {{ $role->name }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error
                            :messages="$errors->get('role')"
                            class="mt-2"/>

                        {{-- The Status Field --}}
{{--                        <x-input-label for="Status">--}}
{{--                            {{__("Status")}}--}}
{{--                        </x-input-label>--}}
{{--                        <select--}}
{{--                            id="Status"--}}
{{--                            name="status"--}}
{{--                            class="block mt-1 w-full px-2 py-1 border-gray-300--}}
{{--                                        focus:outline-indigo-500 focus:outline-2 focus:ring-2 focus:ring-indigo-500--}}
{{--                                        rounded-md shadow-sm"--}}
{{--                            type="text"--}}
{{--                            :value="old('status')"--}}
{{--                            required autofocus autocomplete="status">--}}
{{--                            <option>No Status Provided</option>--}}
{{--                        </select>--}}
{{--                        <x-input-error--}}
{{--                            :messages="$errors->get('status')"--}}
{{--                            class="mt-2"/>--}}

                        {{-- The password field --}}
                        <x-input-label for="Password" :value="__('Password')">
                            {{__("Password")}}
                        </x-input-label>
                        <x-text-input
                            type="password"
                            id="Password"
                            class="block mt-1 w-full"
                            name="password"/>
                        <x-input-error
                            :messages="$errors->get('password')"
                            class="mt-2"/>

                        {{-- The password confirmation field --}}
                        <x-input-label for="PasswordConfirmation"
                                       :value="__('Confirm Password')">
                            {{__("Password Confirmation")}}
                        </x-input-label>
                        <x-text-input
                            type="password"
                            id="PasswordConfirmation"
                            class="block mt-1 w-full"
                            name="password_confirmation"/>
                        <x-input-error
                            :messages="$errors->get('password_confirmation')"
                            class="mt-2"/>

                    </div>

                    <footer class="mt-4 gap-4 flex bg-neutral-200 -m-4 p-2 px-4">
                        <x-primary-button
                            class="bg-green-900! hover:bg-green-700! hover:text-white!">
                            Save
                        </x-primary-button>

                        <x-secondary-link-button
                            class="bg-neutral-700 hover:bg-yellow-700"
                            href="{{ route('admin.users.index') }}">
                            Cancel
                        </x-secondary-link-button>

                    </footer>
                </form>
            </section>

        </article>

    </section>

</x-admin-layout>
