@extends('layouts.app')
@section('content')
<h1>Categories</h1>
<a href="{{route('admin.categories.create')}}" class="btn btn-dark">Add Category</a>
<a href="{{route('admin.dashboard')}}" class="btn btn-secondary">Home</a>
<div>
    <h1>Category Table</h1>
</div>
<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
                <td>
                    <div class="d-flex gap-2">
                        <a href="{{route('admin.categories.edit',$category->id)}}" class='btn btn-secondary w-25'>Edit</a>
                        <form action="{{route('admin.categories.destroy',$category->id)}}" method='POST' onsubmit=" return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark">Delete Category</button>
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
</div>
@endsection