<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $paginate = $request->get('paginate', 10);

        $books = Book::query()
            ->when(
                $request->search,
                function (Builder $builder) use ($request) {
                    $builder->where('name', 'like', "{$request->search}%");
                }
            )
            ->paginate($paginate)
            ->appends($request->query());

        return view('index', compact('books'));
    }

    public function create()
    {
        return view('insert');
    }

    public function store()
    {
        // return view('insert');
    }
}
