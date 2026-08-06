<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Create Category
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a
                    href="{{ route('categories.index') }}"
                    class="text-blue-600 hover:text-blue-800 font-medium">

                    ← Back to Categories

                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">

                <form action="{{ route('categories.store') }}" method="POST">

                    @csrf

                    <div class="mb-5">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Category Name
                        </label>

                        <input
                            type="text"
                            name="name"
                            value="{{ old('name') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">

                        @error('name')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div class="mb-6">

                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Description
                        </label>

                        <textarea
                            name="description"
                            rows="4"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">{{ old('description') }}</textarea>

                        @error('description')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                    <div class="flex justify-end">

                        <button
                            type="submit"
                            class="rounded-md bg-blue-600 px-5 py-2 text-white font-medium hover:bg-blue-700 transition">

                            Save Category

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>