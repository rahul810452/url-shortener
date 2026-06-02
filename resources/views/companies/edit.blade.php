<x-app-layout>

<div class="max-w-3xl mx-auto p-6">

    <div class="bg-white shadow rounded-lg p-6">

        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">
                Edit Company
            </h2>

            <a href="{{ route('companies.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Back
            </a>
        </div>

        <form method="POST"
              action="{{ route('companies.update',$company->id) }}">

            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">
                    Company Name
                </label>

                <input type="text"
                       name="company_name"
                       value="{{ old('company_name',$company->company_name) }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                @error('company_name')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium mb-2">
                    Email
                </label>

                <input type="email"
                       name="company_email"
                       value="{{ old('company_email',$company->company_email) }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                @error('company_email')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="mb-6">
                <label class="block text-sm font-medium mb-2">
                    Phone
                </label>

                <input type="text"
                       name="company_phone"
                       value="{{ old('company_phone',$company->company_phone) }}"
                       class="w-full border rounded-lg px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none">

                @error('company_phone')
                    <p class="text-red-500 text-sm mt-1">
                        {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex gap-3">

                <button type="submit"
                        class="bg-green-600 text-white px-5 py-2 rounded hover:bg-green-700">
                    Update Company
                </button>

                <a href="{{ route('companies.index') }}"
                   class="bg-gray-500 text-white px-5 py-2 rounded hover:bg-gray-600">
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</x-app-layout>
