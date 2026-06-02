<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">
            Create Short URL
        </h2>

        <form method="POST"
              action="{{ route('short-urls.store') }}">

            @csrf

            <input
                type="url"
                name="original_url"
                class="w-full border p-2 rounded"
                placeholder="https://google.com">

            <button
                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">

                Generate URL

            </button>

        </form>

    </div>

</div>

</x-app-layout>
