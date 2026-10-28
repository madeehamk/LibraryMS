@extends('layouts.app')
@section('content')
<h1>Edit Category</h1>
<div>
    <form action="{{route('admin.categories.update',$category->id)}}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Category Name</label>
            <input type="text" name="name" id="name" value="{{$category->name}}">
        </div>
        <div>
            <label for="description">Description</label>
            <textarea name="description" id="description">{{$category->description}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>
@endsection