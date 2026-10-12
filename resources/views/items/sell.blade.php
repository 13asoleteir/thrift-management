<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Sell Item
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <a
                    href="{{ route('items.index') }}"
                    class="text-blue-600 hover:text-blue-800 font-medium">

                    ← Back to Items

                </a>
            </div>

            <div class="bg-white shadow rounded-lg p-6">

                <h3 class="text-lg font-semibold text-gray-800 mb-6">
                    Sell: {{ $item->name }}
                </h3>

                <form action="{{ route('items.markAsSold', $item) }}" method="POST" class="space-y-6">

                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Sold Price
                        </label>

                        <input
                            type="number"
                            step="0.01"
                            min="0"
                            name="sold_price"
                            value="{{ old('sold_price', $item->sold_price ?? '') }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500"
                            placeholder="0.00">

                        @error('sold_price')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="grid gap-6 md:grid-cols-2">
                        <div>
                            <label for="shipping_fee" class="block text-sm font-medium text-gray-700 mb-2">
                                Shipping Fee (₱)
                            </label>

                            <input
                                type="number"
                                name="shipping_fee"
                                id="shipping_fee"
                                step="0.01"
                                min="0"
                                value="{{ old('shipping_fee', $item->shipping_fee ?? 0) }}"
                                placeholder="0.00"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            />

                            @error('shipping_fee')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="other_expenses" class="block text-sm font-medium text-gray-700 mb-2">
                                Other Expenses (₱)
                            </label>

                            <input
                                type="number"
                                name="other_expenses"
                                id="other_expenses"
                                step="0.01"
                                min="0"
                                value="{{ old('other_expenses', $item->other_expenses ?? 0) }}"
                                placeholder="0.00"
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                            />

                            @error('other_expenses')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            Sold Date
                        </label>

                        <input
                            type="date"
                            name="sold_at"
                            value="{{ old('sold_at', now()->format('Y-m-d')) }}"
                            class="w-full rounded-md border-gray-300 shadow-sm focus:border-green-500 focus:ring-green-500">

                        @error('sold_at')
                            <p class="mt-2 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <div class="flex justify-end gap-3 pt-2">

                        <a
                            href="{{ route('items.index') }}"
                            class="rounded-md border border-gray-300 px-5 py-2 text-gray-700 hover:bg-gray-100 transition">

                            Cancel

                        </a>

                        <button
                            type="submit"
                            class="rounded-md bg-green-600 px-5 py-2 text-white font-medium hover:bg-green-700 transition">

                            Mark as Sold

                        </button>

                    </div>

                </form>

            </div>

        </div>
    </div>

</x-app-layout>