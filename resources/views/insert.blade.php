@extends('layout')

@section('content')
<div class="p-6 bg-gray-50 text-gray-800 min-h-screen">
  <div class="flex justify-end">
    <a href="{{ route('home.index') }}" class="bg-red-600 hover:bg-red-700 py-2 px-4 text-white rounded-md">Back</a>
  </div>
  <form method="GET" action="{{ route('home.store') }}">
    aa
  </form>
</div>
@endsection