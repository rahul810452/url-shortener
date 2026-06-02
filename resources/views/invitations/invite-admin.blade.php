<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">
            Invite Admin
        </h2>

        <form method="POST"
              action="{{ route('invitations.store') }}">

            @csrf

            <input type="hidden"
                   name="company_id"
                   value="{{ $company->id }}">

            <div class="mb-4">

                <label>Company</label>

                <input type="text"
                       value="{{ $company->company_name }}"
                       class="w-full border p-2 bg-gray-100"
                       readonly>

            </div>

            <div class="mb-4">

                <label>Email</label>

                <input type="email"
                       name="email"
                       class="w-full border p-2">

            </div>

            <button
                class="bg-blue-600 text-white px-4 py-2 rounded">

                Send Invitation

            </button>

        </form>

    </div>

</div>

</x-app-layout>
