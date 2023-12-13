@extends('template.template')
@extends('template.navbar')

<div class="container">
    <h1>Profile</h1>

    <form method="post" action="{{ route('editProfileForm') }}">
        @csrf

        <div class="form-group">
            <label for="name">Username</label>
            <input type="text" id="name" name="name" value="{{ $user->name }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" readonly>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" value="{{ $user->password }}" class="form-control" readonly>
        </div>

        <!-- Add other form fields as needed -->

        <!-- Use an anchor tag to link to edit.blade.php -->
        <a href="{{ route('editProfileForm') }}" class="btn btn-primary">Edit Information</a>
    </form>
</div>

@section('content')
@endsection
