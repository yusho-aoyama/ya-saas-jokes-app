<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Categories')}}: <i class="fa-solid fa-sticky-note"></i> {{ __('Detail') }}
            </h3>

            <x-primary-link-button
                href="{{ route('admin.categories.create') }}">
                <i class="fa-solid fa-plus"></i>
                New Category
            </x-primary-link-button>

        </header>


        <dl class="grid grid-cols-6 m-4 w-full shadow mb-6">
            <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                Name
            </dt>
            <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                {{ $category->title }}
            </dd>

            <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                Description
            </dt>
            <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                {!! $category->description !!}
            </dd>
        </dl>

        <footer class="flex gap-4">
            <x-primary-link-button
                href="{{ route('admin.categories.index') }}"
                class="hover:bg-sky-500 gap-4">
                <i class="fa-solid fa-list"></i>
                <span>All Categories</span>
            </x-primary-link-button>

            <x-primary-link-button
                href="{{ route('admin.categories.edit', $category) }}"
                class="hover:bg-green-500 gap-4">
                <i class="fa-solid fa-edit "></i>
                <span>Edit</span>
            </x-primary-link-button>

            <x-secondary-link-button
                href="{{ route('admin.categories.delete', $category) }}"
                class="hover:bg-red-500!
                        text-gray-500! hover:text-white!
                         gap-4">
                <i class="fa-solid fa-times"></i>
                <span>Delete</span>
            </x-secondary-link-button>

        </footer>
    </section>

</x-admin-layout>
