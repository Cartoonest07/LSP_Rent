@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container">
        <h1>{{ $instrument->name }}</h1>
        @if($instrument->image)
            <img src="{{ Storage::url($instrument->image) }}" alt="Gambar Instrumen" style="max-width: 100px; height: auto;">
        @endif
        <p>Type: {{ $instrument->type }}</p>
        <p>Brand: {{ $instrument->brand }}</p>
        <p>Brand: {{ $instrument->description }}</p>
        <p>Brand: {{ $instrument->stock_quantity }}</p>
        <p>Brand: {{ $instrument->rental_price }}</p>
        <p>Brand: {{ $instrument->condition }}</p>
        <!-- Tampilkan detail lainnya di sini -->
    </div>
@endsection
