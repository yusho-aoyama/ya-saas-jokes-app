<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Categories')}}: {{ __('Edit') }}
            </h3>
        </header>

        <form action="{{ route('admin.categories.update', $category) }}"
              method="POST">

            @csrf
            @method('PUT')
        <div class="flex flex-col gap-4">

            <x-input-label for="Title">Name</x-input-label>
            <x-text-input name="title"
                          id="Title"
                          type="text"
                          placeholder="Category title"
                          value="{{ old('title') ?? $category->title }}"
                          required autofocus
                          autocomplete="title"
            />
            <x-input-error :messages="$errors->get('title')" class="mt-2"></x-input-error>

            <x-input-label for="Description">Description</x-input-label>
            <x-text-input name="description"
                          id="Description"
                          type="text"
                          placeholder="Category description"
                          value="{{ old('description') ?? $category->description }}"
                          required autofocus
                          autocomplete="description"
            />
            <x-input-error :messages="$errors->get('description')" class="mt-2"></x-input-error>

        </div>
        <footer class="mt-8">


                <x-primary-link-button
                    href="{{ route('admin.categories.index') }}"
                    class="hover:bg-sky-500 gap-4">
                    <i class="fa-solid fa-list"></i>
                    <span>All Categories</span>
                </x-primary-link-button>

                <x-primary-button
                    type="submit"
                    class="hover:bg-green-500">
                    <i class="fa-solid fa-save"></i>
                    <span>Save</span>
                </x-primary-button>

                <x-secondary-link-button
                    href="{{ route('admin.categories.index') }}"
                    class="bg-red-100 hover:bg-red-500
                                       text-gray-500! hover:text-white!">
                    <i class="fa-solid fa-times"></i>
                    <span>Cancel</span>
                </x-secondary-link-button>

        </footer>
        </form>
    </section>

</x-admin-layout>
