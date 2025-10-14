<x-app-layout>
    <div class="container mx-auto px-4 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
        <h1 class="text-2xl font-bold mb-4">Edit User: {{ $user->name }}</h1>

        @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-2 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <div class="mt-4">
                <label>Name:</label>
                <x-text-input type="text" name="name" value="{{ old('name', $user->name) }}" class="border p-2 w-full" required />
            </div>

           <div class="mt-4">
                <label>Email:</label>
                <x-text-input type="email" name="email" value="{{ old('email', $user->email) }}" class="border p-2 w-full" required />
            </div>

            <div class="mt-4">
                <label>ID Number:</label>
                <x-text-input type="text" name="id_number" value="{{ old('id_number', $user->id_number) }}" class="border p-2 w-full" required />
            </div>

            <div class="mt-4">
                <label>Date of Birth:</label>
                <x-text-input type="date" name="date_of_birth" value="{{ old('date_of_birth', $user->date_of_birth) }}" class="border p-2 w-full" required />
            </div>

            <div class="mt-4">
                <label>Mobile Number:</label>
                <x-text-input type="text" name="mobile_number" value="{{ old('mobile_number', $user->mobile_number) }}" class="border p-2 w-full" required />
            </div>

            <div class="mt-4">
                <label>Nationality:</label>
                <x-text-input type="text" name="nationality" value="{{ old('nationality', $user->nationality) }}" class="border p-2 w-full" required />
            </div>

            <div class="mt-4">
                <label>Gender:</label>
                <select name="gender" class="block mt-1 w-full border-gray-300 rounded-md" required>
                    <option value="male" {{ $user->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ $user->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>

            <div class="mt-4">
                <label>Qualification:</label>
                <x-text-input type="text" name="qualification" value="{{ old('qualification', $user->qualification) }}" class="border p-2 w-full" />
            </div>

            <div class="mt-4">
                <label>Specialization:</label>
                <x-text-input type="text" name="specialization" value="{{ old('specialization', $user->specialization) }}" class="border p-2 w-full" />
            </div>

            <div class="mt-4">
                <label>Role:</label>
                <select name="role" class="block mt-1 w-full border-gray-300 rounded-md" required>
                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
            </div>

            <div class="mt-4">
                <label>Approved:</label>
                <select name="is_approved" class="block mt-1 w-full border-gray-300 rounded-md" required>
                    <option value="1" {{ $user->is_approved ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ !$user->is_approved ? 'selected' : '' }}>No</option>
                </select>
            </div>
            <x-primary-button class=" mt-3">{{ __('Update User') }}</x-primary-button>
            {{-- <button type="submit" class="bg-blue-500  px-4 py-2 rounded">Update User</button> --}}
        </form>
    </div>
</x-app-layout>
