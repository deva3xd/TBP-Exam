@extends('layout')

@section('content')
<div class="p-6 bg-gray-50 text-gray-800 min-h-screen">
  <form method="GET" action="{{ route('home.index') }}">
    <div class="flex justify-between items-center mb-4">
      <div>
        <label for="paginate" class="mr-2 text-sm">Show</label>
        <select id="paginate" name="paginate" onchange="this.form.submit()" class="bg-white text-gray-700 border border-gray-300 rounded p-1 focus:ring-2 focus:ring-blue-400">
          <option value="10" {{ request('paginate') == 10 ? 'selected' : '' }}>10</option>
          <option value="25" {{ request('paginate') == 25 ? 'selected' : '' }}>25</option>
          <option value="50" {{ request('paginate') == 50 ? 'selected' : '' }}>50</option>
        </select>
        <span class="ml-2 text-sm text-gray-500">entries per page</span>
      </div>

      <!-- search -->
      <div>
        <label for="search" class="mr-2 text-sm">Search:</label>
        <input type="text" id="search" name="search" placeholder="book name" class="bg-white text-gray-700 border border-gray-300 rounded px-2 py-1" />
        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 text-sm font-medium rounded-md">Search</button>
      </div>
      <!-- search end -->
    </div>
  </form>

  <!-- table -->
  <div class="overflow-x-auto border border-gray-300 rounded-lg shadow-sm bg-white">
    <table class="min-w-full text-sm">
      <thead class="bg-gray-100 text-gray-600">
        <tr>
          <th class="py-2 px-4 text-left font-semibold">No</th>
          <th class="py-2 px-4 text-left font-semibold">Book Name</th>
          <th class="py-2 px-4 text-left font-semibold">Category Name</th>
          <th class="py-2 px-4 text-left font-semibold">Author Name</th>
          <th class="py-2 px-4 text-left font-semibold">Average Rating</th>
          <th class="py-2 px-4 text-left font-semibold">Voter</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        @foreach ($books as $book)
        <tr class="hover:bg-gray-50 transition">
          <td class="py-2 px-4">{{ $book->id }}</td>
          <td class="py-2 px-4">{{ $book->name }}</td>
          <td class="py-2 px-4">{{ $book->category->name }}</td>
          <td class="py-2 px-4">{{ $book->author->name }}</td>
          <td class="py-2 px-4">33</td>
          <td class="py-2 px-4">33</td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <!-- table end -->

  {{ $books->links('pagination::tailwind') }}
</div>
@endsection