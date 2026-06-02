<x-app-layout>

<div class="max-w-7xl mx-auto p-6">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-2xl font-bold">
            Team Members
        </h2>

        <a href="{{ route('members.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Invite Member
        </a>

    </div>

    <div class="bg-white shadow rounded-lg overflow-hidden">

        <table class="min-w-full">

            <thead class="bg-gray-100">

                <tr>
                    <th class="px-4 py-3 text-left">Name</th>
                    <th class="px-4 py-3 text-left">Email</th>
                </tr>

            </thead>

            <tbody>

                @forelse($members as $member)

                <tr class="border-t">

                    <td class="px-4 py-3">
                        {{ $member->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $member->email }}
                    </td>

                </tr>

                @empty

                <tr>

                    <td colspan="2"
                        class="text-center py-6">

                        No Members Found

                    </td>

                </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>

</x-app-layout>
