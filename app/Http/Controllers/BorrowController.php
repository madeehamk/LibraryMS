<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Borrow;
use App\Models\Member;
use App\Models\Book;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create($bookId)
    {
        $book = Book::findOrFail($bookId);

        $members = Member::where('status', 'Active')->get();

        return view('borrow.create', compact('book', 'members'));
    }
    /**
     * Show the form for creating a new resource.
     */
    // Store borrowing
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'member_id' => 'required|exists:members,id',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        $book = Book::findOrFail($request->book_id);

        // Check availability
        if ($book->available_copies <= 0) {
            return back()->with('error', 'This book is not available.');
        }

        Borrow::create([
            'book_id' => $request->book_id,
            'member_id' => $request->member_id,
            'issue_date' => now(),
            'due_date' => $request->due_date,
            'status' => 'Issued',
        ]);

        // Reduce available copies
        $book->decrement('available_copies');

        return redirect()
            ->route('books.index')
            ->with('success', 'Book borrowed successfully.');
    }
}

/**
 * Store a newly created resource in storage.
 */
    // public function store(Request $request)
    // {
    //     $validated = $request->validate([
    //         'member_id' => 'required|exists:members,id',
    //         'book_id' => 'required|exists:books,id',
    //         'issued_at' => 'required|date',
    //         'due_at' => 'required|date|after_or_equal:issued_at',
    //         'returned_at' => 'nullable|date|after_or_equal:issued_at',
    //         'fine_amount' => 'nullable|numeric|min:0',
    //         'status' => 'required|in:borrowed,returned,overdue',
    //     ]);

    //     $book = Book::findOrFail($validated['book_id']);
    //     $book->decrement('available_copies');

    //     Borrow::create($validated);
    //     return redirect()->route('borrows.index')->with('success', 'Borrow record created successfully.');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(string $id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(string $id)
    // {
    //     $borrow = Borrow::findOrFail($id);
    //     $members = Member::all();
    //     $books = Book::all();
    //     return view('admin.borrows.edit', compact('borrow', 'members', 'books'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, string $id)
    // {
    //     $borrow = Borrow::findOrFail($id);
    //     $validated = $request->validate([
    //         'member_id' => 'required|exists:members,id',
    //         'book_id' => 'required|exists:books,id',
    //         'issued_at' => 'required|date',
    //         'due_at' => 'required|date|after_or_equal:issued_at',
    //         'returned_at' => 'nullable|date|after_or_equal:issued_at',
    //         'fine_amount' => 'nullable|numeric|min:0',
    //         'status' => 'required|in:borrowed,returned,overdue',
    //     ]);

    //     $borrow->update($validated);
    //     return redirect()->route('borrows.index')->with('success', 'Borrow record updated successfully.');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(string $id)
    // {
    //     $borrow = Borrow::findOrFail($id);
    //     $borrow->delete();
    //     return redirect()->route('borrows.index')->with('success', 'Borrow record deleted successfully.');
    // }
