<x-app-layout>
<div class="container mx-auto px-4 bg-white shadow rounded-lg p-4 sm:p-6 xl:p-8  2xl:col-span-2">
    <h1 class="text-2xl font-bold mb-4">All Users</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-2 mb-4 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full table-auto border border-gray-200">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">ID</th>
                <th class="border px-4 py-2">Name</th>
                <th class="border px-4 py-2">Email</th>
                <th class="border px-4 py-2">Role</th>
                <th class="border px-4 py-2">Approved</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td class="border px-4 py-2">{{ $user->id }}</td>
                    <td class="border px-4 py-2">{{ $user->name }}</td>
                    <td class="border px-4 py-2">{{ $user->email }}</td>
                    <td class="border px-4 py-2">{{ $user->role }}</td>
                    <td class="border px-4 py-2">{{ $user->is_approved ? 'Yes' : 'No' }}</td>
                    <td class="border px-4 py-2 space-x-2">
                        @if(!$user->is_approved)
                        <form action="{{ route('admin.approve', $user->id) }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-green-500 px-2 py-1 rounded">Approve</button>
                        </form>
                        @endif

                        <a href="{{ route('admin.user.edit', $user->id) }}" class="bg-blue-500 px-2 py-1 rounded">Edit</a>

                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-app-layout>
