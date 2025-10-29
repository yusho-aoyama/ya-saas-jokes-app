<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Admin Zone') }}
        </h2>
    </x-slot>

    <section class="py-12 mx-12 space-y-4">

        <header>
            <h3 class="text-2xl font-bold text-zinc-700">
                {{__('Categories')}}
            </h3>
        </header>

        <table class="table w-full bg-white border">
            <thead class="bg-black text-gray-200">
                {{-- tr>th*3 --}}
            <tr>
                <th class="p-2">Name</th>
                <th class="p-2">Description</th>
                <th class="p-2">Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($categories as $category)
                <tr class="odd:bg-gray-100">
                    <td class="p-2">{{ $category->title }}</td>
                    <td class="p-2">{{ $category->description }}</td>
                    <td class="p-2">Shoe Edit Delete</td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No Categories</td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td class="p-4" colspan="3">
                    @if($categories->hasPages())
                        {{ $categories->links() }}
                    @else
                        @if($categories->total() > 0)
                            All categories shown
                        @else
                            No categories
                        @endif
                    @endif
                </td>
            </tr>
            </tfoot>
        </table>
    </section>

</x-admin-layout>
