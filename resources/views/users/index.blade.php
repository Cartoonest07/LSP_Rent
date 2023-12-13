@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Daftar Member</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <form action="{{ route('users.update', $user->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <select name="role" onchange="this.form.submit()">
                                    <option value="customer" {{ $user->role === 'customer' ? 'selected' : '' }}>Customer</option>
                                    <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                                </select>
                            </form>
                        </td>
                        <td>
                            @if ($user->role === 'customer')
                                <a href="{{ route('users.history', $user->id) }}" class="btn btn-info">Riwayat Peminjaman</a>
                            @else
                                <span>-</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
