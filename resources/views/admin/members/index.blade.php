@extends('layouts.app')
@section('content')
<div class="container">
    <a href="{{ route('admin.members.create') }}" class="btn btn-dark mb-3">Add Member</a>
    <h1>Members List</h1>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Membership Number</th>
                <th>Membership Expiration</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($members as $member)
            <tr>
                <td>{{ $member->id }}</td>
                <td>{{ $member->name }}</td>
                <td>{{ $member->email }}</td>
                <td>{{ $member->membership_number }}</td>
                <td>{{ $member->membership_expiration }}</td>
                <td>{{ $member->status }}</td>
                <td>
                    <a href="{{ route('admin.members.edit', $member->id) }}" class="btn btn-primary">Edit</a>

                    <!-- Delete button -->
                    <form action="{{ route('admin.members.destroy', $member->id) }}" method="POST" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this member?')">Delete</button>
                    </form>

                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection