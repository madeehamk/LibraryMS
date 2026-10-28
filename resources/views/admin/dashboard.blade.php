@extends('layouts.app')
@section('content')
<h1>Admin dashboard</h1>
<a href="{{ route('admin.categories.create') }}" class="btn btn-dark">Add Category</a>
<a href="{{ route('admin.books.create') }}" class="btn btn-dark">Add Book</a>
<a href="{{ route('admin.members.create') }}" class="btn btn-dark">Add Member</a>

<a href="{{route('admin.categories.index')}}" class="btn btn-secondary">View Category</a>
<a href="{{ route('admin.books.index') }}" class="btn btn-dark">View Book</a>
<a href="{{ route('admin.members.index') }}" class="btn btn-dark">View Member</a>
@endsection