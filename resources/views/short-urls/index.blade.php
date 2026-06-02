<x-app-layout>

<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Short URLs
        </h2>

        <a href="{{ route('short-urls.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Create URL
        </a>

    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-100">

                <tr>

                    <th class="px-6 py-3 text-left font-semibold">
                        Original URL
                    </th>

                    <th class="px-6 py-3 text-left font-semibold">
                        Short URL
                    </th>

                    <th class="px-6 py-3 text-center font-semibold">
                        Clicks
                    </th>

                </tr>

            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($urls as $url)

                <tr>

                    <td class="px-6 py-4">
                        {{ $url->original_url }}
                    </td>

                    <td class="px-6 py-4">

                        <a href="{{ url('/s/'.$url->short_code) }}"
                           target="_blank"
                           class="text-blue-600 hover:underline">

                            {{ url('/s/'.$url->short_code) }}

                        </a>

                    </td>

                    <td class="px-6 py-4 text-center">
                        {{ $url->clicks }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="3"
                        class="text-center py-8">

                        No URLs Found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>
