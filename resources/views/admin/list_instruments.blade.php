@extends('template.template')
@extends('template.navbar')

@section('content')
    <div class="container">
        <a href="{{ route('instruments.create') }}">Add New Instrument</a>
        @foreach ($instruments as $instrument)
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $instrument->name }}</h5>
                    <a href="{{ route('instruments.show', $instrument) }}">View Details</a>
                    <form action="{{ route('instruments.delete', $instrument) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
