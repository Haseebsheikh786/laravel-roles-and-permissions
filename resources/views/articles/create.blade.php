<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('articles.store') }}" method="post">
                        @csrf
                        <div class="space-y-6">
                            <!-- Title -->
                            <div>
                                <label for="title" class="block text-lg font-medium text-gray-700">Title</label>
                                <input
                                    id="title"
                                    name="title"
                                    type="text"
                                    placeholder="Enter Title"
                                    class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>
                            </div>

                            <!-- Content -->
                            <div>
                                <label for="content" class="block text-lg font-medium text-gray-700">Content</label>
                                <textarea
                                    id="content"
                                    name="content"
                                    rows="5"
                                    placeholder="Enter Content"
                                    class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required></textarea>
                            </div>

                            <!-- Author -->
                            <div>
                                <label for="author" class="block text-lg font-medium text-gray-700">Author</label>
                                <input
                                    id="author"
                                    name="author"
                                    type="text"
                                    placeholder="Enter Author's Name"
                                    class="mt-1 block w-full border-gray-300 shadow-sm rounded-lg focus:border-indigo-500 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                    required>
                            </div>

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button
                                    type="submit"
                                    class="w-full bg-slate-700 text-sm rounded-md text-white px-5 py-3 hover:bg-slate-800 transition">
                                    Submit
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>