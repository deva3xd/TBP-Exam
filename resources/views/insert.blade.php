@extends('layout')

@section('content')
<div class="p-6 bg-gray-50 text-gray-800 min-h-screen flex flex-col items-center justify-center">
  <form method="POST" action="{{ route('home.store') }}">
    @csrf
    <div class="flex flex-col mx-auto w-96">
      <label for="book_author" class="mr-2 text-sm">Book Author</label>
      <input type="text" id="book_author" class="bg-white text-gray-700 border border-gray-300 rounded p-2" value="{{ $author->name }}" disabled />
      <label for="book_id" class="mr-2 text-sm">Book Name</label>
      <select id="book_id" name="book_id" class="bg-white text-gray-700 border border-gray-300 rounded p-2">
        @foreach ($books as $book)
          <option value="{{ $book->id }}">{{ $book->name }}</option>
        @endforeach
      </select>
      <label for="search" class="mr-2 text-sm">Rating</label>
      <input type="number" min="1" max="10" id="rating" name="rating" placeholder="0" class="bg-white text-gray-700 border border-gray-300 rounded p-2" />
      <button type="submit" class="py-2 px-4 mt-4 bg-blue-600 hover:bg-blue-700 rounded-md text-white font-semibold">Submit</button>
    </div>
  </form>
  <div class="flex justify-end">
    <a href="{{ route('home.index') }}" class="hover:underline mt-2">Back</a>
  </div>
</div>
@endsection