@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('admin.books.create') }}" class="btn btn-dark mb-3">Add Book</a>
    <table class="table">
        <thead>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Cover Image</th>
            <th>Actions</th>
        </thead>
        @foreach($books as $book)
        <tbody>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>{{$book->category->name}}</td>
            <td>
                @if($book->cover_image)
                <img src="{{ asset('storage/' . $book->cover_image) }}" alt="Cover Image" style="width: 50px; height: auto;">
                @endif
            </td>
            <td>
                <a href="{{ route('admin.books.edit', $book->id) }}" class="btn btn-sm btn-secondary">Edit</a>
                <form action="{{ route('admin.books.destroy', $book->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </td>
        </tbody>
        @endforeach
    </table>
    @endsection