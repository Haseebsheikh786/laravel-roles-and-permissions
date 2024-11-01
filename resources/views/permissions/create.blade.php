<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('permission') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm: px-6 lg: px-8">
            <div class=" Ibg-white overflow-hidden shadow-sm sm: rounded-lg">
                <div class="p-6 ☐ text-gray-900">
                    <form action="{{ route('permissions.store') }}" method="post">
                        @csrf
                        <div>
                            <label for="" class="text-lg font-medium">Name</label>
                            <div class="my-3">
                                <input placeholder="Enter Name" name="name" type="text" class=" |border-gray-300
shadow-sm w-1/2 rounded-lg">
                            </div>
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit </button>

                        </div>
                    </form>
                </div>
            </div>
        </div>
</x-app-layout>