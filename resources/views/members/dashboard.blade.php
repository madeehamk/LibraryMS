@extends('layouts.app')
@section('content')
<h1>Member dashboard</h1>
@foreach($categories as $category)
<h1>{{$category->name}}</h1>
<table>
    <thead>
        <tr>
            <th>Title</th>
            <th>Author</th>
            <th>Category</th>
            <th>Publisher</th>
            <th>Year</th>
            <th>Cover</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($category->books as $book)
        <tr>

            <td>{{$book->title}}</td>
            <td>{{$book->author}}</td>
            <td>Category: {{$book->category->name}}</td>
            <td>Publisher: {{$book->published_year}}</td>
            <td>Year: {{$book->status}}</td>
            <td><img src="{{ asset('storage/' . $book->cover_image) }}" alt="{{ $book->title }}" class="img-fluid">
            </td>
            <td>
                <a href="{{ route('members.borrow.create', $book->id) }}"
                    class="btn btn-dark">
                    Borrow
                </a>

            </td>

        </tr>
        @endforeach
        </div>
    </tbody>
</table>
@endforeach

</div>
@endsection