<x-app-layout>
    <div class="max-w-7xl mx-auto p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">Companies</h2>

            <a href="{{ route('companies.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Add Company
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-hidden">

            <table class="min-w-full">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Company</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Phone</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($companies as $company)

                    <tr class="border-t">
                        <td class="px-4 py-3">{{ $company->id }}</td>
                        <td class="px-4 py-3">{{ $company->company_name }}</td>
                        <td class="px-4 py-3">{{ $company->company_email }}</td>
                        <td class="px-4 py-3">{{ $company->company_phone }}</td>

                        <td class="px-4 py-3 text-center">
                            <a href="{{ route('companies.edit',$company->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded">
                                Edit
                            </a>

                            <a href="{{ route('companies.invite-admin',$company->id) }}"
                            class="bg-blue-600 text-white px-3 ml-2 py-1 rounded">
                                Invite Admin
                            </a>
                        </td>
                    </tr>

                    @empty

                    <tr>
                        <td colspan="5" class="text-center py-4">
                            No Companies Found
                        </td>
                    </tr>

                    @endforelse
                </tbody>
            </table>

        </div>
    </div>
</x-app-layout>
