@extends('layouts.app')

@section('content')
<div class="mx-auto max-w-2xl">
    
    <div class="mb-6">
        <a href="{{ route('books.index') }}" class="inline-flex items-center gap-2 text-sm font-medium text-slate-500 hover:text-indigo-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5 3 12m0 0 7.5-7M3 12h18" />
            </svg>
            Back to Books List
        </a>
    </div>

    <div class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm sm:p-8">
        
        <div class="mb-8 border-b border-slate-100 pb-5">
            <h2 class="text-xl font-bold tracking-tight text-slate-900 sm:text-2xl">Edit Book Details</h2>
            <p class="mt-1 text-sm text-slate-500">Modify the book information and save changes to the system.</p>
        </div>

        <form action="{{ route('books.update', $book->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Book Title</label>
                <input type="text" 
                       id="title"
                       name="title" 
                       placeholder="e.g., 1984" 
                       value="{{ old('title', $book->title ?? '') }}"
                       class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 shadow-sm transition-all placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('title') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                @error('title')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="author" class="block text-sm font-semibold text-slate-700 mb-2">Author</label>
                <input type="text" 
                       id="author"
                       name="author" 
                       placeholder="e.g., George Orwell" 
                       value="{{ old('author', $book->author ?? '') }}"
                       class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 shadow-sm transition-all placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('author') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                @error('author')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="pages" class="block text-sm font-semibold text-slate-700 mb-2">Total Pages</label>
                <input type="number" 
                       id="pages"
                       name="pages" 
                       placeholder="e.g., 320" 
                       value="{{ old('pages', $book->pages ?? '') }}"
                       class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 shadow-sm transition-all placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('pages') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">
                @error('pages')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Description</label>
                <textarea id="description"
                          name="description" 
                          rows="4"
                          placeholder="Provide a detailed description of the book..." 
                          class="w-full rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-sm text-slate-900 shadow-sm transition-all placeholder:text-slate-400 focus:border-indigo-500 focus:outline-none focus:ring-1 focus:ring-indigo-500 @error('description') border-red-500 focus:ring-red-500 focus:border-red-500 @enderror">{{ old('description', $book->description ?? '') }}</textarea>
                @error('description')
                    <p class="mt-1.5 text-xs font-medium text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-end gap-3 border-t border-slate-100 pt-6">
                <a href="{{ route('books.index') }}" 
                   class="rounded-xl border border-slate-200 bg-white px-5 py-2.5 text-sm font-semibold text-slate-700 transition-colors hover:bg-slate-50">
                    Cancel
                </a>
                
                <button type="submit" 
                        class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm shadow-indigo-100 transition-all hover:bg-indigo-500 active:scale-95">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="h-4 w-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
                    </svg>
                    Save Changes
                </button>
            </div>

        </form>
    </div>
</div>
@endsection