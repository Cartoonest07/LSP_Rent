<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Instrument;
use Carbon\Carbon;

class ReturnController extends Controller
{
    public function create()
    {
        // Ambil data yang mungkin diperlukan untuk form
        $users = User::where('role', 'customer')->get();
        $instruments = Instrument::all();

        return view('return.create', compact('users', 'instruments'));
    }

    public function store(Request $request)
{
    $request->validate([
        'user_id' => 'required|exists:users,id',
        'instrument_id' => 'required|exists:instruments,id',
        'rented_at' => 'required|date',
        'returned_at' => 'required|date|after_or_equal:rented_at'
    ]);

    // Ambil user dan tambahkan data peminjaman ke instrumen
    $user = User::findOrFail($request->user_id);
    $user->instruments()->attach($request->instrument_id, [
        'rented_at' => Carbon::parse($request->rented_at),
        'returned_at' => Carbon::parse($request->returned_at)
    ]);

    return redirect()->route('dashboard')->with('success', 'Pengembalian berhasil disimpan.');
}

}