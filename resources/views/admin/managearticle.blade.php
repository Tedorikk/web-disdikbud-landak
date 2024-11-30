
<x-app-layout class="bg-white text-black">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kelola Artikel') }}
        </h2>
    </x-slot>
    <div class="flex flex-row pt-10 pb-5 px-20 items-center justify-between">
        <div class="text-black text-xl font-bold">Total Artikel: {{ $articleCount }}</div>
        <div class="flex flex-row gap-10">
            <a href="{{ route(name: 'articles.create') }}" class="btn btn-primary mb-3 text-white">Buat Artikel Baru +</a>
        </div>
    </div>
    <div class="relative overflow-x-auto mx-10 rounded-xl border-2 border-slate-200 cursor-default text-black">
        <table class="w-full text-base text-left rtl:text-right">
            <thead class="text-xs ">
                <tr>
                    <th scope="col" class="px-6 py-3 text-base">Id</th>
                    <th scope="col" class="px-6 py-3 text-base">Tanggal Publish</th>
                    <th scope="col" class="px-6 py-3 text-base">Judul</th>
                    <th scope="col" class="px-6 py-3 text-base">Penulis</th>
                    <th scope="col" class="px-6 py-3 text-base">Status</th>
                    <th scope="col" class="px-6 py-3 text-base">Kelola</th>
                </tr>
            </thead>
            <tbody>
                @forelse($articles as $article)
                    <tr class="bg-white border-b">
                        <td class="px-6 py-4">{{ $article->id }}</td>
                        <td class="px-6 py-4">{{ $article->post_date }}</td>
                        <td class="px-6 py-4">{{ $article->title }}</td>
                        <td class="px-6 py-4">{{ $article->author->name }}</td>
                        <td class="px-6 py-4">{{ $article->status }}</td>
                        <td class="px-6 py-4 flex flex-row gap-5">
                            <a href="{{ route('articles.show', $article->id) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center">No articles found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $articles->links() }}
    </div>
</div>
</x-app-layout>