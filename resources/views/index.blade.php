@extends('layouts.app')

@section('content')
<div class="space-y-6">

    <div class="flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">Books List</h1>
            <p class="mt-1 text-sm text-slate-500">Management dashboard for all books available in the system.</p>
        </div>

        <a href="{{ route('books.create') }}"
            class="inline-flex items-center justify-center gap-2 rounded-xl bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm shadow-indigo-100 transition-all duration-200 hover:bg-indigo-500 hover:shadow-lg hover:shadow-indigo-200 active:scale-95">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7-7H5" />
            </svg>
            Add New Book
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        <div class="min-w-full overflow-x-auto">
            <table class="w-full min-w-[700px] text-left border-collapse">
                <thead>
                    <tr class="border-b border-slate-200 bg-slate-50 text-xs font-semibold uppercase tracking-wider text-slate-500">
                        <th class="px-6 py-4 text-center w-16">ID</th>
                        <th class="px-6 py-4">Book Title</th>
                        <th class="px-6 py-4">Description</th>
                        <th class="px-6 py-4 text-right w-48">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-slate-200 bg-white">
                    @forelse($books as $book)
                    <tr class="transition-colors hover:bg-slate-50/80">
                        <td class="whitespace-nowrap px-6 py-4 text-center text-sm font-medium text-slate-400">
                            #{{ $book->id }}
                        </td>

                        <td class="px-6 py-4">
                            <a href="{{ route('books.show', $book->id) }}"
                                class="text-sm font-semibold text-indigo-600 hover:text-indigo-900 hover:underline transition-colors block max-w-xs truncate">
                                {{ $book->title }}
                            </a>
                        </td>

                        <td class="px-6 py-4">
                            <p class="text-sm text-slate-600 line-clamp-2 max-w-md">
                                {{ $book->description ?? 'No description available.' }}
                            </p>
                        </td>

                        <td class="whitespace-nowrap px-6 py-4 text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-3">

                                <a href="{{ route('books.edit', $book->id) }}"
                                    class="inline-flex items-center gap-1 rounded-lg border border-slate-200 bg-white px-3 py-1.5 text-xs font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-50 hover:text-indigo-600">
                                    <svg xmlns="http://www.w3.org/2000/xl" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.128-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                                    </svg>
                                    Edit
                                </a>

                                <form action="{{ route('books.destroy', $book->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="inline-flex items-center gap-1 rounded-lg border border-transparent bg-red-50 px-3 py-1.5 text-xs font-semibold text-red-600 transition-all hover:bg-red-100 active:scale-95">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-3.5 w-3.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                        Delete
                                    </button>
                                </form>

                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="px-6 py-12 text-center text-sm text-slate-500">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <span class="text-3xl">📭</span>
                                <p class="font-medium text-slate-600">No books added yet</p>
                                <p class="text-xs text-slate-400">Click the "Add New Book" button to create your first entry.</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection