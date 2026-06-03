@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-3xl">
    
    <div class="mb-6">
        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7M3 12h18" />
            </svg>
            Back to Books List
        </a>
    </div>

    <div class="overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
        
        <div class="border-b border-slate-100 bg-slate-50/50 p-6 sm:p-8">
            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                <div class="space-y-1">
                    <div class="inline-flex items-center rounded-md bg-indigo-50 px-2 py-1 text-xs font-medium text-indigo-700 ring-1 ring-inset ring-indigo-700/10 mb-2">
                        Book ID: #{{ $book->id }}
                    </div>
                    <h1 class="text-2xl font-bold tracking-tight text-slate-900 sm:text-3xl">
                        {{ $book->title }}
                    </h1>
                    <p class="text-md font-medium text-slate-500">
                        by <span class="text-slate-800 font-semibold">{{ $book->author ?? 'Unknown Author' }}</span>
                    </p>
                </div>

                <div class="flex items-center gap-2 sm:self-start">
                    <a href="{{ route('books.edit', $book->id) }}" 
                       class="inline-flex items-center gap-1.5 rounded-xl border border-slate-200 bg-white px-4 py-2 text-sm font-semibold text-slate-700 shadow-sm transition-all hover:bg-slate-50 hover:text-indigo-600">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L6.832 19.82a4.5 4.5 0 0 1-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 0 1 1.128-1.897L16.863 4.487Zm0 0L19.5 7.125" />
                        </svg>
                        Edit
                    </a>

                    <form action="{{ route('books.destroy', $book->id) }}" method="POST"  class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="inline-flex items-center gap-1.5 rounded-xl bg-red-50 px-4 py-2 text-sm font-semibold text-red-600 transition-all hover:bg-red-100 active:scale-95">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.8" stroke="currentColor" class="h-4 w-4">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                            </svg>
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="p-6 sm:p-8 space-y-6">
            
            <div class="grid grid-cols-2 gap-4 rounded-xl bg-slate-50 p-4 sm:grid-cols-3">
                <div class="space-y-1">
                    <p class="text-xs font-medium text-slate-400 uppercase tracking-wider">Total Pages</p>
                    <p class="text-lg font-bold text-slate-800 flex items-center gap-1.5">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-5 w-5 text-indigo-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
                        </svg>
                        {{ $book->pages ?? 'N/A' }} pages
                    </p>
                </div>
            </div>

            <div class="space-y-2">
                <h3 class="text-sm font-bold uppercase tracking-wider text-slate-400">Description</h3>
                <div class="prose prose-slate max-w-none text-slate-600 leading-relaxed bg-slate-50/30 rounded-xl border border-slate-100 p-4 sm:p-5">
                    {{ $book->description ?? 'No description provided for this book.' }}
                </div>
            </div>

        </div>
    </div>
</div>
@endsection