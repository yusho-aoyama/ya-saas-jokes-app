<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Updated the dashboard design--}}
    <div class="py-12 space-y-6">

        {{-- Welcome Card --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-6 flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Welcome back, {{ $user->name }}</h2>
                    <p class="mt-1 text-gray-600">You're logged in!</p>
                </div>
            </div>
        </div>

        {{-- Joke Count Card --}}
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md sm:rounded-xl p-6">
                <h3 class="text-lg font-semibold text-gray-700 mb-2">Your Activity</h3>

                <div class="flex items-center space-x-4">
                    <div class="p-4 bg-blue-100 text-blue-600 rounded-full">
                        {{-- Fontawesome Icon--}}
                        <i class="fa-solid fa-face-grin-squint-tears text-3xl text-blue-600"></i>
                    </div>

                    <div>
                        <p class="text-3xl font-bold text-gray-900">{{ $jokeCount }}</p>
                        <p class="text-gray-600">Jokes you have created</p>
                    </div>
                </div>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4">
                <div class="p-6 text-gray-900 flex items-center gap-4">
                    <div>
                        <i class="fas fa-thumbs-up text-green-500"></i>
                        Likes: {{ $likes }}
                    </div>
                    <div>
                        <i class="fas fa-thumbs-down text-red-500"></i>
                        Dislikes: {{ $dislikes }}
                    </div>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
