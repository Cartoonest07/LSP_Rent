@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container mt-4">
        <h1>Input Pengembalian</h1>
        <form action="{{ route('return.store') }}" method="post">
            @csrf
            <div class="form-group">
                <label for="user_id">ID Customer:</label>
                <select name="user_id" id="user_id" class="form-control">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }} ({{ $user->id }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="instrument_id">ID Barang:</label>
                <select name="instrument_id" id="instrument_id" class="form-control">
                    @foreach($instruments as $instrument)
                        <option value="{{ $instrument->id }}">{{ $instrument->name }} ({{ $instrument->id }})</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="rented_at">Tanggal Dipinjam:</label>
                <input type="date" name="rented_at" id="rented_at" class="form-control">
            </div>
            <div class="form-group">
                <label for="returned_at">Tanggal Dikembalikan:</label>
                <input type="date" name="returned_at" id="returned_at" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
