@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container my-4">
        <div class="row">
            <!-- Kartu List Instrument -->
            <div class="col-md-4 mb-4">
                <div class="custom-card">
                    <h3>List Instrument</h3>
                    <p>Deskripsi tentang instrumen.</p>
                    <a href="{{ route('instruments.index') }}" class="btn btn-primary">Lihat List</a>
                </div>
            </div>

            <!-- Kartu List Member -->
            <div class="col-md-4 mb-4">
                <div class="custom-card">
                    <h5 class="card-title">List Member</h5>
                    <p class="card-text">Lihat daftar member.</p>
                    <a href="{{ route('users.index') }}" class="btn btn-primary">Lihat Member</a>
                </div>
            </div>

            <!-- Kartu Input Pengembalian -->
            <div class="col-md-4 mb-4">
                <div class="custom-card">
                    <h5 class="card-title">Input Pengembalian</h5>
                    <p class="card-text">Input data pengembalian instrumen.</p>
                    <a href="{{ route('return.create') }}" class="btn btn-primary">Input Pengembalian</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
<style>
    .container {
        padding: 20px;
        background-color: #f4f4f4;
    }

    .custom-card {
        background: white;
        padding: 20px;
        margin-bottom: 15px;
        border-radius: 10px;
        border: 1px solid #ddd;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .custom-card:hover {
        box-shadow: 0 8px 16px rgba(0,0,0,0.2);
        transform: translateY(-5px);
    }

    .btn-primary {
        color: #fff;
        background-color: #007bff;
        border-color: #007bff;
    }
</style>
@endpush
