@extends('template.template')
@extends('template.navbar')

<div class="container">
    <h1>Edit Profile</h1>

    <form method="post" action="{{ route('editProfileUpdate') }}">
        @csrf

        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" class="form-control">
        </div>

        <!-- Add other form fields as needed -->

        <button type="submit" class="btn btn-primary">Edit</button>
    </form>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif  
</div>
