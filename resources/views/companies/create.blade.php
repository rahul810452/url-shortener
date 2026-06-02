<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <h2 class="text-2xl font-bold mb-6">
            Create Company
        </h2>

        <form method="POST"
              action="{{ route('companies.store') }}">

            @csrf

            <div class="mb-4">
                <label class="block mb-2">
                    Company Name
                </label>

                <input type="text"
                       name="company_name"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-2">
                    Email
                </label>

                <input type="email"
                       name="company_email"
                       class="w-full border rounded px-3 py-2">
            </div>

            <div class="mb-4">
                <label class="block mb-2">
                    Phone
                </label>

                <input type="text"
                       name="company_phone"
                       class="w-full border rounded px-3 py-2">
            </div>

            <button
                class="bg-green-600 text-white px-5 py-2 rounded">
                Save Company
            </button>

        </form>

    </div>

</div>

</x-app-layout>
