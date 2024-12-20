<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                <div class="text-end">
                    @can('create users')
                        <a href="{{ route('users.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add User</a
                        @endcan
                    </div>
                    <table class="min-w-full my-5">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Name</th>
                                <th class="border px-4 py-2">Email</th>
                                <th class="border px-4 py-2">Roles</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $user->id }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2">{{ $user->roles->pluck("name")->implode(',') }}</td>
                                @can('edit users')
                                <td class="border px-4 py-2">
                                    <a href="{{ route('users.edit', $user->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>
                                    @can('delete users')
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                                    </form>
                                    @endcan
                                    @endcan
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>