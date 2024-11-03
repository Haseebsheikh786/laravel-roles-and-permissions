<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.update', $user->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input
                                    name="name"
                                    value="{{ old('name', $user->name) }}"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter Name">
                                </div>
                                <div>
                            <label for="name" class="text-lg font-medium">Email</label>
                            <div class="my-3">                                <input
                                    name="email"
                                    value="{{ old('email', $user->email) }}"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter Email">
                                    </div>
                                    <div>
                            <div class="grid grid-cols-4">
                                @if ($roles->isNotEmpty())
                                @foreach ($roles as $role)
                                <div class="mt-3">
                                     <input {{($hasRoles->contains($role->id))?"checked":""}}
                                     type="checkbox"   class="rounded" name="role[]" id="{{$role->id}}"
                                        value="{{ $role->name }}">
                                    <label for="{{$role->id}}">{{ $role->name }}</label>
                                </div>
                                @endforeach
                                @endif
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3 mt-3">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>