<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('User Admin') }}
        </h2>
    </x-slot>

    <section class="py-4 mx-8 space-y-4 ">
        <header class="flex justify-between">
            <h3 class="text-2xl font-bold text-zinc-700">
                Users
            </h3>
            <div class="flex flex-row items-center gap-2">
                <x-primary-link-button
                    href="{{ route('admin.users.create') }}">
                    <i class="fa-solid fa-plus"></i>
                    New User
                </x-primary-link-button>
            {{-- Search function --}}
{{--                <form action="{{ route('admin.users') }}" method="GET" class="flex--}}
{{--                flex-row gap-1">--}}
{{--                    <x-text-input id="search"--}}
{{--                                  type="text"--}}
{{--                                  name="search"--}}
{{--                                  class="border border-gray-200 rounded-r-none shadow-transparent"--}}
{{--                                  :value="$search??''"--}}
{{--                    />--}}

{{--                    <button type="submit"--}}
{{--                            class="flex items-center gap-1 text-green-800 bg-gray-200 border-gray-300--}}
{{--                             rounded-lg px-4 py-1 rounded-l-none hover:bg-green-800 hover:text-white transition">--}}
{{--                        <i class="fa-solid fa-magnifying-glass"></i>--}}
{{--                        Search--}}
{{--                    </button>--}}
{{--                </form>--}}
            </div>
        </header>
        <div class="flex flex-1 w-full max-h-min overflow-x-auto">
            <table class="min-w-full divide-y-2 divide-gray-200 bg-gray-50">
                <thead class="sticky top-0 bg-zinc-700 ltr:text-left rtl:text-right">
                <tr class="*:font-medium *:text-white">
                    <th class="px-3 py-2 whitespace-nowrap">User</th>
                    <th class="px-3 py-2 whitespace-nowrap">Role</th>
                    <th class="px-3 py-2 whitespace-nowrap">Status</th>
                    <th class="px-3 py-2 whitespace-nowrap">Actions</th>
                </tr>
                </thead>

                <tbody class="divide-y divide-gray-200">
                @foreach($users as $user)

                    <tr class="*:text-gray-900 *:first:font-medium hover:bg-white">
                        <td class="px-3 py-1 whitespace-nowrap flex flex-col min-w-1/3">
                            <span class="">{{ $user->name }}</span>
                            <span class="text-sm text-gray-500">{{ $user->email }}</span>
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-auto">
                            <span class="text-xs rounded-full bg-gray-700 p-0.5 px-2 text-gray-200">
                                role
                            </span>
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-1/6">
                            Suspended
                        </td>
                        <td class="px-3 py-1 whitespace-nowrap w-1/8">
                            <form action="{{ route('admin.users.destroy', $user) }}"
                                  method="POST"
                                  class="grid grid-cols-3 gap-2 w-full">
                                @csrf
                                @method('DELETE')

                                <x-primary-link-button
                                    href="{{ route('admin.users.show', $user) }}"
                                    class="hover:bg-sky-500">
                                    <i class="fa-solid fa-user"></i>
                                    <span class="sr-only">Show</span>
                                </x-primary-link-button>

                                <x-primary-link-button
                                    href="{{ route('admin.users.edit', $user) }}"
                                    class="hover:bg-green-500">
                                    <i class="fa-solid fa-user-cog"></i>
                                    <span class="sr-only">Edit</span>
                                </x-primary-link-button>
                                <x-secondary-link-button
                                    href="{{ route('admin.users.delete', $user) }}"
                                    class="hover:bg-red-500!
                                 text-gray-500! hover:text-white!">
                                    <i class="fa-solid fa-user-slash"></i>
                                    <span class="sr-only">Delete</span>
                                </x-secondary-link-button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>

                <tfoot>
                <tr>
                   <td colspan="4" class="p-3">
                       {{ $users->onEachSide(2)->links("vendor.pagination.tailwind") }}
                   </td>
                </tr>
                </tfoot>
            </table>
        </div>


    </section>


</x-admin-layout>
