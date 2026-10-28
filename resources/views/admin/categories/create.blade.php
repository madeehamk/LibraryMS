@extends('layouts.app')
@section('content')
<h1>Add Category</h1>
<form action="{{route('admin.categories.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for='name'>Category Name</label>
        <input type='text' name='name' id='name' placeholder='Enter category name' required>
    </div>
    <div>
        <label for='description'>Description</label>
        <textarea name='description' id='description' placeholder='Enter category description' required></textarea>
    </div>
    <button type='submit' class='btn btn-dark'>Save Book Category</button>
</form>
@endsection