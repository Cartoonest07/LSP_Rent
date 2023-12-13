@extends('template.template')

@section('content')
    <div class="container">
        <h1>Add New Instrument</h1>
        <form action="{{ route('instruments.store') }}" method="POST">
            @csrf
            <input type="text" name="name" placeholder="Name">
            <input type="text" name="type" placeholder="Type">
            <input type="text" name="brand" placeholder="Brand">
            <input type="text" name="description" placeholder="Description">
            <input type="text" name="stock_quantity" placeholder="Stok">
            <input type="text" name="rental_price" placeholder="Rental price">
            <input type="text" name="condition" placeholder="Condition">
            <!-- Form fields untuk data lainnya -->
            <button type="submit">Add</button>
        </form>
    </div>
@endsection
