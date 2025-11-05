<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{ __('Confirm Delete User') }}
                <em>{{ $user->name }}</em>
            </h3>

            <x-primary-link-button
                href="{{ route('admin.users.create') }}">
                <i class="fa-solid fa-plus"></i>
                New User
            </x-primary-link-button>
        </header>
        <header class="bg-neutral-800 text-neutral-50 text-lg px-4 py-2">
            <h5>
                {{ __('Details for') }}
                <em>{{ $user->name }}</em>
            </h5>
        </header>
        <form action="{{ route('admin.users.destroy', $user) }}"
              method="POST">

            @csrf
            @method ('DELETE')
            {{-- show each new section as a separate block of code. --}}
            <dl class="grid grid-cols-6 m-4 w-full shadow mb-6">
                {{-- Name --}}
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{__("Name")}}:
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $user->name ?? __("No Name provided") }}
                </dd>

                {{-- Email --}}
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{__("Email")}}
                    <i class="fa-solid fa-email"></i>
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $user->email ?? __("No Email provided") }}
                </dd>
                {{-- Role --}}
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{__("Role")}}:
                    <i class="fa-solid fa-user-friends"></i>
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $user->role ?? __("No Role") }}
                </dd>
                {{-- Status --}}
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{__("Status")}}:
                    <i class="fa-solid fa-user-lock"></i>
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $user->status ?? __("No Status") }}
                </dd>
                {{-- Added (Created at) and Updated (Updated at) Dates --}}
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{ __("Added") }}
                    <i class="fa-solid fa-calendar"></i>
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $user->created_at->format('j M Y') ?? __("-")}}
                </dd>
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    {{ __("Updated") }}
                    <i class="fa-solid fa-calendar"></i>
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{-- **Need to fix**--}}
                    {{ $user->updated_at->format('j M Y') ?? __("-")}}
                </dd>
            </dl>

            <footer class="flex gap-4">
                <x-primary-link-button
                    href="{{ route('admin.users') }}"
                    class="hover:bg-sky-500 gap-4">
                    <i class="fa-solid fa-list"></i>
                    <span>All Users</span>
                </x-primary-link-button>

                <x-primary-link-button
                    href="{{ route('admin.users.edit', $user) }}"
                    class="hover:bg-green-500 gap-4">
                    <i class="fa-solid fa-edit "></i>
                    <span>Edit</span>
                </x-primary-link-button>

                {{-- Use type="submit" --}}
                <x-secondary-button
                    type="submit"
                    class="hover:bg-red-500!
                            text-gray-500! hover:text-white!
                             gap-4">
                    <i class="fa-solid fa-times"></i>
                    <span>Confirm Delete</span>
                </x-secondary-button>

            </footer>
        </form>
    </section>

</x-admin-layout>
