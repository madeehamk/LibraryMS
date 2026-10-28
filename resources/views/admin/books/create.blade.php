@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Add Book</h1>
    <form action="{{ route('admin.books.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for='title'>Title</label>
            <input type='text' name='title' id='title' placeholder='Enter book title' required>
        </div>
        <div>
            <label for='author'>Author</label>
            <input type='text' name='author' id='author' placeholder='Enter book author' required>
        </div>
        <div>
            <label for='category_id'>Category</label>
            <select name='category_id' id='category_id' required>
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label for='isbn'>ISBN</label>
            <input type='text' name='isbn' id='isbn' placeholder='Enter book ISBN'>
        </div>
        <div>
            <label for='published_year'>Published Year</label>
            <input type='number' name='published_year' id='published_year' placeholder='Enter published year'>
        </div>
        <div>
            <label for="available_copies" class="form-label">Available stock</label>
            <input type="number" name="available_copies" id="available_copies">
        </div>
        <div>
            <label for='cover_image'>Cover Image</label>
            <input type='file' name='cover_image' id='cover_image'>
        </div>
        <button type='submit' class='btn btn-dark'>Save Book</button>
        @endsection