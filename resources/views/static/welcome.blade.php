<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fresh jokes every time you click') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <span class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                {{-- @forelse($jokes as $joke)--}}
                @if($joke)
                    <article class="rounded-lg border border-gray-200 bg-white p-4">
                        <header class="bg-black text-gray-200 -mx-4 -mt-4 p-4">
                            <h3 class="mb-2 text-xl font-medium">
                                {{ $joke->title }}
                            </h3>

                            <p class="block text-xs text-gray-400">Added:
                                <time datetime="{{ $joke->created_at }}">
                                    {{ $joke->created_at }}
                                </time>
                            </p>
                        </header>
                        <div class="flex flex-col gap-4 mt-4 text-lg">
                            {!! $joke->content !!}
                        </div>
                        <footer class="bg-gray-800 mt-6 -mx-4 p-4 flex gap-2">
                            @foreach($joke->categories as $category)
                                <span class="inline-block rounded-all bg-gray-100 px-2.5 py-0.5 text-sm whitespace-nowrap text-gray-700">
                                    {{ $category->title }}
                                </span>
                            @endforeach
                        </footer>

                        {{-- If the user is logged in, the like/dislike button will be displayd --}}
                        @auth
                            <div class="mt-4">
                                @livewire('like-dislike', ['joke' => $joke])
                            </div>
                        @endauth
                    </article>

                    {{-- Another Joke button--}}
                    <div class="mt-6">
                        <a href="{{ route('home') }}"
                           class="inline-block px-4 py-2 bg-orange-600 text-white rounded
                           hover:bg-orange-700 transition">
                            <i class="fa-solid fa-dice"></i>
                                Another Joke
                        </a>
                    </div>

                {{-- @empty--}}
                @else
                    <h3 class="p-8 mb-8 text-xl font-medium">
                        No jokes found
                    </h3>
                @endif
                {{-- @endforelse--}}

            </div>
        </div>
    </div>

</x-app-layout>
