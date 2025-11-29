<x-app-layout>
    <section class="p-12 mx-12 space-y-4">
        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Jokes')}}: <i class="fa-solid fa-sticky-note"></i> {{ __('Delete') }}
            </h3>

            <div>
                <x-primary-link-button
                    href="{{ route('jokes.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    New Joke
                </x-primary-link-button>


            </div>
        </header>

        <form action="{{ route('jokes.destroy', $joke) }}"
              method="POST">

            @csrf
            @method ('DELETE')


            <dl class="grid grid-cols-6 m-4 w-full shadow mb-6">
                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    Name
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $joke->title }}
                </dd>

                <dt class="col-span-1 bg-gray-200 border-b-1 border-b-gray-300 p-2 text-gray-700">
                    Content
                </dt>
                <dd class="col-span-5 border-b-1 border-b-gray-300 p-2">
                    {{ $joke->content }}
                </dd>
            </dl>

            <footer class="flex gap-4">
                <x-primary-link-button
                    href="{{ route('jokes.index') }}"
                    class="hover:bg-sky-500 gap-4">
                    <i class="fa-solid fa-list"></i>
                    <span>All Jokes</span>
                </x-primary-link-button>

                <x-primary-link-button
                    href="{{ route('jokes.show', $joke) }}"
                    class="hover:bg-green-500 gap-4">
                    <i class="fa-solid fa-eye "></i>
                    <span>Show</span>
                </x-primary-link-button>

                {{-- [type="submit"] -> send --}}
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

</x-app-layout>
