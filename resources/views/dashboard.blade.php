
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            Dashboard
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="mb-6">
                <h3 class="text-2xl font-bold text-gray-800">
                    ThriftTrack Overview
                </h3>
                <p class="mt-1 text-gray-600">
                    Here's how your thrift inventory is doing.
                </p>
            </div>

            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">

                {{-- Total Items --}}
                <div class="rounded-lg bg-white p-6 shadow">
                    <p class="text-sm font-medium text-gray-500">
                        Total Items
                    </p>
                    <p class="mt-2 text-3xl font-bold text-gray-800">
                        {{ $totalItems }}
                    </p>
                </div>

                {{-- Available Items --}}
                <div class="rounded-lg bg-white p-6 shadow">
                    <p class="text-sm font-medium text-gray-500">
                        Available Items
                    </p>
                    <p class="mt-2 text-3xl font-bold text-green-600">
                        {{ $availableItems }}
                    </p>
                </div>

                {{-- Sold Items --}}
                <div class="rounded-lg bg-white p-6 shadow">
                    <p class="text-sm font-medium text-gray-500">
                        Sold Items
                    </p>
                    <p class="mt-2 text-3xl font-bold text-blue-600">
                        {{ $soldItems }}
                    </p>
                </div>

                {{-- Total Profit --}}
                <div class="rounded-lg bg-white p-6 shadow">
                    <p class="text-sm font-medium text-gray-500">
                        Total Profit
                    </p>
                    <p class="mt-2 text-3xl font-bold
                        {{ $totalProfit >= 0 ? 'text-green-600' : 'text-red-600' }}">
                        ₱{{ number_format($totalProfit, 2) }}
                    </p>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>