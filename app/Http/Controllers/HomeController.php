<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->get('paginate', 10);

        $books = Book::query()
            ->withAvg('rating', 'rating')
            ->withCount('rating')
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('name', 'like', "{$request->search}%");
                }
            )
            ->paginate($paginate)
            ->appends($request->query());

        $authors = Author::query()
            ->take(10)
            ->get();

        return view('index', compact('books', 'authors'));
    }

    public function create($id)
    {
        $books = Book::where('author_id', $id)->get();
        $author = Author::findOrFail($id);

        return view('insert', compact('books', 'author'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'book_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:10',
        ]);
        $randomUser = User::inRandomOrder()->first();
        $validated['user_id'] = $randomUser->id;
        Rating::create($validated);

        return redirect()->route('home.index')->with('success', 'Data Added');
    }
}
