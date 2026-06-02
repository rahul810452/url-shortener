<x-app-layout>

<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">
            Admin Invitations
        </h2>

        <a href="{{ route('invitations.create') }}"
           class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
            Invite Admin
        </a>
    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="min-w-full divide-y divide-gray-200">

            <thead class="bg-gray-100">
                <tr>
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">Email</th>
                    <th class="px-6 py-3 text-left">Role</th>
                    <th class="px-6 py-3 text-left">Status</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200">

                @forelse($invitations as $invite)

                <tr>

                    <td class="px-6 py-4">
                        {{ $invite->id }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $invite->email }}
                    </td>

                    <td class="px-6 py-4">
                        {{ $invite->role }}
                    </td>

                    <td class="px-6 py-4">

                        @if($invite->accepted)

                            <span class="bg-green-100 text-green-700 px-3 py-1 rounded">
                                Accepted
                            </span>

                        @else

                            <span class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded">
                                Pending
                            </span>

                        @endif

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="4"
                        class="text-center py-6">
                        No Invitations Found
                    </td>
                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>
