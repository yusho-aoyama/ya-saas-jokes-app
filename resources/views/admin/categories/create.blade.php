<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Categories')}}: <i class="fa-solid fa-edit"></i> {{ __('Create') }}
            </h3>

            <x-primary-link-button
                href="{{ route('admin.categories.create') }}">
                <i class="fa-solid fa-plus"></i>
                New Category
            </x-primary-link-button>

        </header>

        <form action="{{ route('admin.categories.store') }}"
              method="POST">

            @csrf

            <div class="flex flex-col gap-4">
                <x-input-label for="Title">Title</x-input-label>
                <x-text-input name="title"
                              id="Title"
                              type="text"
                              placeholder="Category title"
                              value="{{ old('title') }}"
                              required autofocus
                              autocomplete="title"
                />
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>

                <x-input-label for="Description">Description</x-input-label>
                <x-textarea name="description"
                              id="Description"
                              placeholder="Category description"
                              value="{{ old('description')}}"
                              autofocus
                              autocomplete="description"
                />
                <x-input-error :messages="$errors->get('description')" class="mt-2"/>

            </div>

            <footer class="mt-8 flex gap-4">

                <x-primary-link-button
                    href="{{ route('admin.categories.index') }}"
                    class="hover:bg-sky-500 gap-4">
                    <i class="fa-solid fa-list"></i>
                    <span>All Categories</span>
                </x-primary-link-button>

                <x-primary-button
                    class="hover:bg-green-500 gap-4">
                    <i class="fa-solid fa-save "></i>
                    <span>Save</span>
                </x-primary-button>

                <x-secondary-link-button
                    href="{{ route('admin.categories.index') }}"
                    class="hover:bg-red-500!
                        text-gray-500! hover:text-white!
                         gap-4">
                    <i class="fa-solid fa-times"></i>
                    <span>Cancel</span>
                </x-secondary-link-button>
            </footer>
        </form>
    </section>

</x-admin-layout>
