<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white p-6 rounded shadow">

        <h2 class="text-xl font-bold mb-4">
            Invite Admin
        </h2>

        <form method="POST"
              action="{{ route('invitations.store') }}">

            @csrf

            <div class="mb-4">

                <label>Company</label>

                <select name="company_id"
                        class="w-full border p-2">

                    @foreach($companies as $company)

                    <option
                        value="{{ $company->id }}">
                        {{ $company->company_name }}
                    </option>

                    @endforeach

                </select>

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
