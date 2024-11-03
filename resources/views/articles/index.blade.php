<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles`') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7x1 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 ">
                @can('create articles')
                    <div class="text-end">
                        <a href="{{ route('articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded-md">Add Articles</a>
                    </div>
                    @endcan
                    <table class="min-w-full my-5">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">ID</th>
                                <th class="border px-4 py-2">Title</th>
                                <th class="border px-4 py-2">Author</th>
                                <th class="border px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach ($articles as $article)
                            <tr>
                                <td class="border px-4 py-2">{{ $article->id }}</td>
                                <td class="border px-4 py-2">{{ $article->title }}</td>
                                <td class="border px-4 py-2">{{ $article->author }}</td>
                                <td class="border px-4 py-2">
                                @can('edit articles')
                                    <a href="{{ route('articles.edit', $article->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded-md">Edit</a>
                                    @endcan
                                    @can('delete articles')
                                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="bg-red-500 text-white px-2 py-1 rounded-md">Delete</button>
                                    </form>
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