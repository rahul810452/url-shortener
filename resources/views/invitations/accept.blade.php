<x-guest-layout>

<div class="max-w-md mx-auto mt-10">

    <div class="bg-white p-6 shadow rounded">

        <h2 class="text-xl font-bold mb-4">
            Complete Registration
        </h2>

        <p class="mb-4">
            {{ $invitation->email }}
        </p>

        <form method="POST"
              action="{{ route('invite.register',$invitation->token) }}">

            @csrf

            <div class="mb-4">

                <label>Name</label>

                <input
                    type="text"
                    name="name"
                    class="w-full border rounded p-2">

            </div>

            <div class="mb-4">

                <label>Password</label>

                <input
                    type="password"
                    name="password"
                    class="w-full border rounded p-2">

            </div>

            <div class="mb-4">

                <label>Confirm Password</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="w-full border rounded p-2">

            </div>

            <button
                class="bg-green-600 text-white px-4 py-2 rounded">

                Create Account

            </button>

        </form>

    </div>

</div>

</x-guest-layout>
