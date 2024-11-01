<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('roles.update', $role->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input
                                    name="name"
                                    value="{{ old('name', $role->name) }}"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter Name">
                            </div>
                            <div class="grid grid-cols-4">
                                @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                <div class="mt-3">
                                    <input type="checkbox" {{($hasPermissions->contains($permission->name))?"checked":""}} class="rounded" name="permission[]" id="{{$permission->id}}"
                                        value="{{ $permission->name }}">
                                    <label for="{{$permission->id}}">{{ $permission->name }}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>