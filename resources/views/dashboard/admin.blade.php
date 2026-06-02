<x-app-layout>

<div class="max-w-7xl mx-auto p-6">

    <h2 class="text-2xl font-bold mb-6">
        Admin Dashboard
    </h2>

    <div class="grid grid-cols-2 gap-6">

        <a href="{{ route('members.index') }}"
           class="bg-white shadow p-6 rounded">

            Team Members

        </a>

        <div class="grid grid-cols-2 gap-6">
            <a href="{{ route('short-urls.index') }}"
            class="bg-white shadow p-6 rounded">

                Short URLs

            </a>

        </div>

    </div>

</div>

</x-app-layout>
