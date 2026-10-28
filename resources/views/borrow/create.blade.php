@extends('layouts.app')

@section('content')

<div class="container">

    <h2 class="mb-4">Borrow Book</h2>

    <!-- Book Information -->
    <div class="card mb-4">
        <div class="card-body">

            <h4>{{ $book->title }}</h4>

            <p class="mb-1">
                <strong>Author:</strong> {{ $book->author }}
            </p>

            <p class="mb-1">
                <strong>Total Copies:</strong> {{ $book->total_copies }}
            </p>

            <p>
                <strong>Available Copies:</strong>
                {{ $book->available_copies }}
            </p>

        </div>
    </div>


    <!-- Borrow Form -->
    <form action="{{ route('members.borrow.store') }}" method="POST">

        @csrf

        <!-- Book ID -->
        <input type="hidden" name="book_id" value="{{ $book->id }}">



        <!-- Due Date -->
        <div class="mb-3">
            <label for="due_date" class="form-label">
                Due Date
            </label>

            <input
                type="date"
                name="due_date"
                id="due_date"
                class="form-control"
                required>
        </div>


        <!-- Buttons -->
        <button type="submit" class="btn btn-primary">
            Borrow Book
        </button>

        <a href="{{ route('members.dashboard') }}" class="btn btn-secondary">
            Cancel
        </a>

    </form>

</div>

@endsection