@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Riwayat Peminjaman {{ $user->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>Nama Instrumen</th>
                    <th>Waktu Peminjaman</th>
                    <th>Waktu Pengembalian</th>
                    <th>Status Keterlambatan</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rentals as $rental)
                    @php
                        $rented_at = \Carbon\Carbon::parse($rental->pivot->rented_at);
                        $returned_at = $rental->pivot->returned_at ? \Carbon\Carbon::parse($rental->pivot->returned_at) : now();
                        $days_diff = $rented_at->diffInDays($returned_at);
                        $is_late = $days_diff > 5;
                    @endphp
                    <tr>
                        <td>{{ $rental->name }}</td>
                        <td>{{ $rented_at->toDateString() }}</td>
                        <td>{{ $returned_at->toDateString() }}</td>
                        <td>{{ $is_late ? 'Terlambat' : 'Tepat Waktu' }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
