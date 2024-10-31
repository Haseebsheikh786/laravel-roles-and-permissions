<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                <div class="text-end">
    <a href="{{ route('permissions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Permission</a>
</div>                 <table class="min-w-full my-5">
    <thead>
        <tr>
            <th class="border px-4 py-2">ID</th>
            <th class="border px-4 py-2">Name</th>
            <th class="border px-4 py-2">Actions</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach ($permissions as $permission)
            <tr>
                <td class="border px-4 py-2">{{ $permission->id }}</td>
                <td class="border px-4 py-2">{{ $permission->name }}</td>
                <td class="border px-4 py-2">
                    <a href="{{ route('permissions.edit', $permission->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>
                    <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" class="inline-block">
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
