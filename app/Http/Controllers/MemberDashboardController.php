<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;

class MemberDashboardController extends Controller
{
    public function index()
    {
        $books = Book::with('category')->get();
        $categories = Category::all();

        return view('members.dashboard', compact('books', 'categories'));
    }
}
