<x-app-layout>
    <section class="p-12 mx-12 space-y-4">
        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Jokes')}}: <i class="fa-solid fa-edit"></i> {{ __('Edit') }}
            </h3>

            <div>
                <x-primary-link-button
                    href="{{ route('jokes.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    New Joke
                </x-primary-link-button>


            </div>
        </header>

        <form action="{{ route('jokes.update' , $joke) }}"
              method="POST">

            @csrf
            @method('PUT')

            <div class="flex flex-col gap-4">
                <x-input-label for="Title">Title</x-input-label>
                <x-text-input name="title"
                              id="Title"
                              type="text"
                              placeholder="Joke title"
                              value="{{ old('title') ?? $joke->title }}"
                              required autofocus
                              autocomplete="title"
                />
                <x-input-error :messages="$errors->get('title')" class="mt-2"/>

                <x-input-label for="Content">Content</x-input-label>
                <x-textarea name="content"
                            id="Content"
                            placeholder="Joke content"
                            autofocus
                            :message="old('content') ?? $joke->content"
                            autocomplete="content"
                />
                <x-input-error :messages="$errors->get('content')" class="mt-2"/>

            </div>

            <footer class="mt-8 flex gap-4">

                <x-primary-link-button
                    href="{{ route('jokes.index') }}"
                    class="hover:bg-sky-500 gap-4">
                    <i class="fa-solid fa-list"></i>
                    <span>All Jokes</span>
                </x-primary-link-button>

                <x-primary-button
                    class="hover:bg-green-500 gap-4">
                    <i class="fa-solid fa-save "></i>
                    <span>Save</span>
                </x-primary-button>

                <x-secondary-link-button
                    href="{{ route('jokes.show', $joke) }}"
                    class="hover:bg-red-500!
                        text-gray-500! hover:text-white!
                         gap-4">
                    <i class="fa-solid fa-times"></i>
                    <span>Cancel</span>
                </x-secondary-link-button>
            </footer>
    </section>

</x-app-layout>
