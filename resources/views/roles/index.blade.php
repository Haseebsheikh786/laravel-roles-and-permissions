<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                    <div class="text-end">
                        <a href="{{ route('roles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Role</a
                            </div>
                        <table class="w-full my-5">
                            <thead>
                                <tr>
                                    <th class="border px-4 py-2 text-center">ID</th>
                                    <th class="border px-4 py-2 text-center">Name</th>
                                    <th class="border px-4 py-2 text-center">Permissions</th>
                                    <th class="border px-4 py-2 text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="border px-4 py-2">{{ $role->id }}</td>
                                    <td class="border px-4 py-2">{{ $role->name }}</td>
                                    <td class="border px-4 py-2">{{ $role->permissions->pluck("name")->implode(',') }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('roles.edit', $role->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>
                                        <form action="{{ route('roles.destroy', $role->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                                        </form>
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