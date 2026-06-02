<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white p-6 shadow rounded">

        <h2 class="text-xl font-bold mb-4">

            Invite Member

        </h2>

        <form method="POST"
              action="{{ route('members.store') }}">

            @csrf

            <input
                type="email"
                name="email"
                placeholder="Member Email"
                class="w-full border p-2 rounded">

            <button
                class="mt-4 bg-blue-600 text-white px-4 py-2 rounded">

                Send Invite

            </button>

        </form>

    </div>

</div>

</x-app-layout>
