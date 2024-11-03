<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="name" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input
                                    name="name"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter Name">
                                </div>
                                <div>
                            <label for="name" class="text-lg font-medium">Email</label>
                            <div class="my-3">            
                                    <input
                                    name="email"
                                    type="text"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter Email">
                                    </div>
                                    <div>
                                <div>
                            <label for="name" class="text-lg font-medium">Password</label>
                            <div class="my-3">            
                                    <input
                                    name="password"
                                    type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter password">
                                    </div>
                                    <div>
                                <div>
                            <label for="name" class="text-lg font-medium">Confirm Password</label>
                            <div class="my-3">            
                                    <input
                                    name="confirm_password"
                                    type="password"
                                    class="border-gray-300 shadow-sm w-1/2 rounded-lg"
                                    placeholder="Enter confirm password">
                                    </div>
                                    <div>
                            <div class="grid grid-cols-4">
                                @if ($roles->isNotEmpty())
                                @foreach ($roles as $role)
                                <div class="mt-3">
                                     <input                                       type="checkbox"   class="rounded" name="role[]" id="{{$role->id}}"
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