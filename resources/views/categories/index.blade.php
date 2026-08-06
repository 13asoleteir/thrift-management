<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Categories
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow rounded-lg p-6">

                @if(session('success'))
                    <div class="mb-6 rounded-md border border-green-200 bg-green-100 px-4 py-3 text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="flex items-center justify-between mb-6">

                    <h3 class="text-2xl font-bold text-gray-800">
                        Category List
                    </h3>

                    <a
                        href="{{ route('categories.create') }}"
                        class="rounded-md bg-blue-600 px-4 py-2 text-white hover:bg-blue-700 transition">

                        + Add Category

                    </a>

                </div>

                <div class="overflow-x-auto">

                    <table class="min-w-full border border-gray-200">

                        <thead class="bg-gray-100">

                            <tr>

                                <th class="border px-4 py-3 text-left">ID</th>

                                <th class="border px-4 py-3 text-left">
                                    Name
                                </th>

                                <th class="border px-4 py-3 text-left">
                                    Description
                                </th>

                                <th class="border px-4 py-3 text-center">
                                    Actions
                                </th>

                            </tr>

                        </thead>

                        <tbody>

                            @forelse ($categories as $category)

                                <tr class="hover:bg-gray-50">

                                    <td class="border px-4 py-3">
                                        {{ $category->id }}
                                    </td>

                                    <td class="border px-4 py-3 font-medium">
                                        {{ $category->name }}
                                    </td>

                                    <td class="border px-4 py-3">
                                        {{ $category->description }}
                                    </td>

                                    <td class="border px-4 py-3">

                                        <div class="flex justify-center gap-2">

                                            <a
                                                href="{{ route('categories.edit', $category) }}"
                                                class="rounded bg-yellow-500 px-3 py-1 text-white hover:bg-yellow-600 transition">

                                                Edit

                                            </a>

                                            <form
                                                action="{{ route('categories.destroy', $category) }}"
                                                method="POST">

                                                @csrf
                                                @method('DELETE')

                                                <button
                                                    type="submit"
                                                    onclick="return confirm('Are you sure you want to delete this category?')"
                                                    class="rounded bg-red-600 px-3 py-1 text-white hover:bg-red-700 transition">

                                                    Delete

                                                </button>

                                            </form>

                                        </div>

                                    </td>

                                </tr>

                            @empty

                                <tr>

                                    <td colspan="4" class="border px-4 py-6 text-center text-gray-500">

                                        No categories found.

                                    </td>

                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

            </div>

        </div>
    </div>

</x-app-layout>