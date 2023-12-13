@extends('template.template')
@extends('template.navbar')

@section('content')

<form action="{{ route('user.update', $user->id) }}" method="post">
    @csrf
    <label for="role">Role:</label>
    <select name="role" id="role">
        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
        {{-- Tambahkan role lainnya sesuai kebutuhan --}}
    </select>
    <button type="submit">Update Role</button>
</form>
@endsection