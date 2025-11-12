<x-app-layout>
    <section class="py-12 mx-12 space-y-4">
        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Jokes')}}
            </h3>

            <div>
                <x-primary-link-button
                    href="{{ route('jokes.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    New Joke
                </x-primary-link-button>

                <div class="text-sm capitalize">
                    Add Search Form Here
                </div>

            </div>
        </header>

        <table class="table w-full bg-white border">
            <thead class="bg-black text-gray-200">
            <tr>
                <th class="p-2">Title</th>
                <th class="p-2">Content</th>
{{--                <th class="p-2">Author</th>--}}
                <th class="p-2">Actions</th>
            </tr>
            </thead>

            <tbody>
            @forelse($jokes as $joke)
                <tr class="odd:bg-gray-100">
                    <td class="p-2">{{ $joke->title }}</td>
                    <td class="p-2">{!! Str::of($joke->content??"")->stripTags() !!}</td>
{{--                    <td class="p-2">{{ $joke->user }}</td>--}}

                    <td class="p-2 flex gap-4">
                        <x-primary-link-button
                            href="{{ route('jokes.show', $joke) }}"
                            class="hover:bg-sky-500">
                            <i class="fa-solid fa-eye pr-2"></i>
                            <span class="sr-only">Show</span>
                        </x-primary-link-button>

                        <x-primary-link-button
                            href="{{ route('jokes.edit', $joke) }}"
                            class="hover:bg-green-500">
                            <i class="fa-solid fa-edit pr-2"></i>
                            <span class="sr-only">Edit</span>
                        </x-primary-link-button>

                        <x-secondary-link-button
                            href="{{ route('jokes.delete', $joke) }}"
                            class="hover:bg-red-500!
                                 text-gray-500! hover:text-white!">
                            <i class="fa-solid fa-times pr-2"></i>
                            <span class="sr-only">Delete</span>
                        </x-secondary-link-button>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="3">No Jokes</td>
                </tr>
            @endforelse
            </tbody>

            <tfoot>
            <tr>
                <td class="p-4" colspan="3">
                    @if($jokes->hasPages())
                        {{ $jokes->links() }}
                    @else
                        @if($jokes->total() > 0)
                            All Jokes shown
                        @else
                            No Jokes
                        @endif
                    @endif
                </td>
            </tr>
            </tfoot>
        </table>
    </section>

</x-app-layout>
