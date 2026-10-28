@extends('layouts.app')
@section('content')
<h1>Edit Member</h1>
<form action="{{route('admin.members.update', $member->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for='name' class="form-label">Member Name</label>
        <input type='text' name='name' id='name' placeholder='Enter member name' value="{{ $member->name }}" required>
    </div>
    <div>
        <label for='email' class="form-label">Email</label>
        <input type='email' name='email' id='email' placeholder='Enter member email' value="{{ $member->email }}" required>
    </div>
    <div>
        <label for='password' class="form-label">Password</label>
        <input type='password' name='password' id='password' placeholder='Enter member password' required>
    </div>
    <div>
        <label for='membership_number' class="form-label">Membership Number</label>
        <input type='text' name='membership_number' id='membership_number' placeholder='Enter membership number' value="{{ $member->membership_number }}" required>
    </div>
    <div>
        <label for='membership_expiration' class="form-label">Membership Expiry Date</label>
        <input type='date' name='membership_expiration' id='membership_expiration' value="{{ $member->membership_expiration }}" required>
    </div>
    <div>
        <label for="status" class="form-label">Status</label>
        <select name="status" id="status" required>
            <option value="active" {{ $member->status == 'active' ? 'selected' : '' }}>Active</option>
            <option value="inactive" {{ $member->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>
    <button type='submit' class='btn btn-dark'>Save Member</button>
</form>
@endsection