<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Categories')}}: {{ __('Detail') }}
            </h3>
        </header>

        <dl class="flex flex-wrap gap-4">
            <dt class="w-1/6">Name</dt>
            <dd class="grow">{{ $category->title }}</dd>
            <dt class="w-1/6">Description</dt>
            <dd class="grow">{{ $category->description }}</dd>


        </dl>
        <footer>
            <x-primary-link-button
                href="{{ route('admin.categories.show', $category) }}"
                class="hover:bg-sky-500 gap-4">
                <i class="fa-solid fa-list"></i>
                <span>All Categories</span>
            </x-primary-link-button>

            <x-primary-link-button
                href="{{ route('admin.categories.edit', $category) }}"
                class="hover:bg-green-500">
                <i class="fa-solid fa-edit"></i>
                <span>Edit</span>
            </x-primary-link-button>

            <x-secondary-link-button
                href="{{ route('admin.categories.delete', $category) }}"
                class="bg-red-100 hover:bg-red-500
                                   text-gray-500! hover:text-white!">
                <i class="fa-solid fa-times"></i>
                <span>Delete</span>
            </x-secondary-link-button>

        </footer>
    </section>

</x-admin-layout>
